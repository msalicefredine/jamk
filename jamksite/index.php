<?php

//require_once("db.php");
$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = dbhost.ugrad.cs.ubc.ca)(PORT = 1522)))(CONNECT_DATA=(SID=ug)))";
$db_conn=OCILogon("ora_t9d9", "a30583132", $db);
// TODO REMOVE USERNAME AND PASSWORD BEFORE PUSH

if (!$db_conn) {
        $err = OCIError();
        echo "Oracle Connect Error " . $err['message'];
    }

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (!empty($_POST['clientSearchRadio'])) {

        $ClientSearchVal = $_POST['clientSearchRadio'];
        $sql = "SELECT ".$ClientSearchVal." FROM Client";

    } else if (!empty($_POST['clientName'])) { // isset bug

        $ClientSearchFilterName = $_POST['clientName'];
        $sql = "SELECT * FROM Client WHERE Name='$ClientSearchFilterName'";

    } else if (!empty($_POST['clientPhone'])) { // isset bug

        $ClientSearchFilterPhone = $_POST['clientPhone'];
        $sql = "SELECT * FROM Client WHERE pNum LIKE '{$ClientSearchFilterPhone}%'"; 

    }

    $stid = oci_parse($db_conn, $sql);

    oci_execute($stid);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hotel JAMK - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Hotel JAMK - Admin Panel</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-user-circle" aria-hidden="true"></i> Client search</a>
                    </li>
                    <li>
                        <a href="roomSearch.html"><i class="fa fa-fw fa-bed"></i> Room search</a>
                    </li>
                    <li>
                        <a href="clientRoomSearch.html"><i class="fa fa-fw fa-address-card"></i> Client-room search</a>
                    </li>
                    <li>
                        <a href="manageDiscounts.html"><i class="fa fa-fw fa-usd"></i> Manage Discounts&nbsp;&nbsp;<i class="fa fa-lock"></i></a>
                    </li>
                    <li>
                        <a href="manageRooms.html"><i class="fa fa-wrench"></i>&nbsp; Manage Rooms&nbsp;&nbsp;<i class="fa fa-lock"></i></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container" style="min-height: 650px;">

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Client Search
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                Find clients by name, phone number, or both
                            </li>
                        </ol>
                        <form action="index.php" method="POST">
                            <div class="radio" id="clientSearchRadio">
                                <label><input type="radio" name="clientSearchRadio" value="*">Get All</label><br>
                                <label><input type="radio" name="clientSearchRadio" value="name">Name</label><br>
                                <label><input type="radio" name="clientSearchRadio" value="pNum">Phone Number</label>
                            </div>
                            <br>
                            <h4>Filter by...</h4>
                            <strong>Client Name: </strong>
                            <input type="text" name="clientName" placeholder="Eg. John"><br><br>
                            <strong>Phone Number: </strong>
                            <input type="text" name="clientPhone" placeholder="Eg. 555"><hr>
                            <div class="form-group" align="right">
                                <button type="submit" class="btn btn-primary btn-block" id="clientSearchSubmit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                    <h1 class="page-header">Results</h1>
                        <div id="resultsTable" class="table-responsive">

<?php
    echo "<table class=\"table table-hover\">";
    echo "<thead><tr><th>CCNUM</th><th>PNUM</th><th>NAME</th></tr></thead>";
    echo "<tbody>";

    while($row = oci_fetch_array($stid)) {
        // echo $row['Name'];
        echo "<tr><td>".$row["CCNUM"]."</td><td>".$row["PNUM"]."</td><td>".$row["NAME"]."</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";

?>
                          
                    </div>
                </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <!-- <script src="js/main.js"></script> -->

</body>

</html>
