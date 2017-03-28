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
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>Jane Doe</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 11:32 PM</p>
                                            <p>I ordered a martini and it's still not here.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Dear Management, I need new pillows.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>Tom Sawyer</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 2:15 PM</p>
                                            <p>The housekeeprs r terribl!</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#"><span class="label label-danger">High season is approaching!</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Lobby 1</a>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="searchClient.php"><i class="fa fa-fw fa-user-circle" aria-hidden="true"></i> Client search</a>
                        </li>
                        <li>
                            <a href="searchRoom.php"><i class="fa fa-fw fa-bed"></i> Room search</a>
                        </li>
                        <li>
                            <a href="clientRoomSearch.php"><i class="fa fa-fw fa-address-card"></i> Client-room search</a>
                        </li>
                        <li>
                            <a href="manageDiscounts.php"><i class="fa fa-fw fa-usd"></i> Manage Discounts&nbsp;&nbsp;<i class="fa fa-lock"></i></a>
                        </li>
                        <li class="active">
                            <a href="manageRooms.php"><i class="fa fa-wrench"></i>&nbsp; Manage Rooms &nbsp;&nbsp;<i class="fa fa-lock"></i></a>
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
                                Manage Rooms
                            </h1>

                            <?php

                            $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = dbhost.ugrad.cs.ubc.ca)(PORT = 1522)))(CONNECT_DATA=(SID=ug)))";
                            $db_conn=OCILogon("ora_z0p8", "a31358120", $db);

                            if (!$db_conn) {
                                $err = OCIError();
                                echo "Oracle Connect Error " . $err['message'];
                            }

                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                // ensure that manager authorization key is correct
                                $AuthorizationCode = $_POST['auth'];
                                $sql = "SELECT overrideCode FROM Manager";
                                $stid = oci_parse($db_conn, $sql);
                                oci_execute($stid);

                                $CorrectCode=FALSE;
                                while ($row = oci_fetch_array($stid)) {
                                    if ($row[0] == $AuthorizationCode) {
                                        $CorrectCode = TRUE;
                                        break;
                                    }
                                }

                                if (!$CorrectCode) {
                                    echo "<div id='authError' class='alert alert-danger'>";
                                    echo "<strong>ERROR</strong> Invalid manager authorization code";
                                    echo "</div>"; 
                                } else {
                                    // delete roomtype from roomtype table
                                    $RoomType = $_POST['room-type'];
                                    $sql = "DELETE FROM RoomType WHERE rType='$RoomType'";
                                    $stid = oci_parse($db_conn, $sql);
                                    $result = oci_execute($stid);

                                // if foreign key constraint violated display error message
                                    if (!$result) {
                                        echo '<div class="alert alert-danger alert-dismissable">';
                                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                                        echo '<strong>Database Error! </strong>';
                                        echo "Cannot execute the following command: " . $sql . "<br>";
                                        $e = oci_error($stid); // For OCIExecute errors pass the statementhandle
                                        echo htmlentities($e['message']);
                                        echo "</div>";
                                    } else {
                                        echo "Success!";
                                    }
                                }
                            }
                            ?>

                            <div class="alert alert-warning">
                                <strong>Managers only</strong> - code is required
                            </div>
                            <form action="manageRooms.php" method="POST">
                                <div class="input-group">
                                    <span class="input-group-addon">Authorization Code</span>
                                    <input id="managerAuth" type="text" class="form-control" name="auth">
                                </div>
                                <hr>
                                <h3>Delete Room Type</h3>
                                <ol class="breadcrumb">
                                    <li class="active">
                                        Delete the selected room type from the database. 
                                    </li>
                                </ol>

                                <div class="input-group">
                                    <?php
                                    // select roomtypes offered by the hotel
                                    $sql = "SELECT rType FROM RoomType";
                                    $stid = oci_parse($db_conn, $sql);
                                    oci_execute($stid);

                                    // display roomtypes as roomtype options
                                    echo "<select id='room-type' class='form-control' name='room-type'>";
                                    echo "<option disabled selected value>Select a Room Type</option>";
                                    while ($row = oci_fetch_array($stid)) {
                                        echo "<option value='".$row['RTYPE']."'>".$row['RTYPE']."</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                    <br>
                                </div>
                                <hr>
                                <div class="form-group" align="right">
                                    <button type="submit" id="manageRoomsSubmit" class="btn btn-primary btn-block">Delete</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="page-header">Results</h1>
                            <div id="resultsTable" class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <?php
                                    if ($CorrectCode) {
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Room Type</th>";
                                        echo "<th>Bed Type</th>";
                                        echo "<th>Number of Beds</th>";
                                        echo "<th>Price</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";;
                                        $sql = "SELECT * FROM RoomType";
                                        $stid = oci_parse($db_conn, $sql);
                                        oci_execute($stid);
                                        while($row = oci_fetch_array($stid)) {
                                            echo "<tr><td>".$row["RTYPE"]."</td><td>".$row["BEDTYPE"]."</td><td>".$row["NUMBEDS"]."</td><td>".$row["RPRICE"]."</td></tr>";
                                        } 
                                    } else {
                                        echo "<div id='authError' class='alert alert-danger'>";
                                        echo "Please enter the manager authorization code";
                                        echo "</div>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>

                        <!-- /.row -->

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script src="js/main.js"></script>


    </body>

    </html>
