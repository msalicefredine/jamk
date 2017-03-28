<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
                    <a class="navbar-brand" href="index.html">Welcome to Hotel JAMK</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                                <strong>The Bar</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Martinis are buy 1 get 1 free! May 1-May 15 only!</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="userCreate.php"><i class="fa fa-fw fa-bookmark" aria-hidden="true"></i> Create Reservation</a>
                        </li>
                        <li>
                            <a href="userModify.php"><i class="fa fa-fw fa-ellipsis-h"></i> Modify Reservation</a>
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
                                Create Reservation
                            </h1>

                            <?php

                            $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = dbhost.ugrad.cs.ubc.ca)(PORT = 1522)))(CONNECT_DATA=(SID=ug)))";
                            $db_conn=OCILogon("ora_z0p8", "a31358120", $db);

                            if (!$db_conn) {
                                $err = OCIError();
                                echo "Oracle Connect Error " . $err['message'];
                            }

                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                 // ensure that the dates are valid
                                $FromDate = $_POST['start-date'];
                                $ToDate = $_POST['end-date']; 
                                if ($FromDate > $ToDate) {
                                    echo "<div class='alert alert-danger alert-dismissable'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo "<strong>Please select a valid date range.</strong>";
                                    echo "</div>";
                                } else {
                                    // add client to client table
                                    $CreditCardNumber = $_POST['cc-num'];
                                    $PhoneNumber = $_POST['client-phone'];
                                    $ClientName = $_POST['client-name'];

                                    $sql = "INSERT INTO Client VALUES ($CreditCardNumber, $PhoneNumber, '$ClientName')";

                                    $stid = oci_parse($db_conn, $sql);

                                    $result = oci_execute($stid);

                                    // if unique constraint violated display error message
                                    if (!$result) {
                                        echo '<div class="alert alert-danger alert-dismissable">';
                                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                                        echo '<strong>Database Error! </strong>';
                                        echo "Cannot execute the following command: " . $sql . "<br>";
                                        $e = oci_error($stid); // For OCIExecute errors pass the statementhandle
                                        echo htmlentities($e['message']);
                                        echo "</div>";
                                    } else {
                                        // check if there are any available rooms of the indicated room type
                                        $RoomType = $_POST['room-type'];

                                        $sql = "SELECT MAX(rm.rNum) AS MAXRNUM FROM Room rm, Reservation rsv WHERE rm.rType='$RoomType' AND rm.rNum = rsv.rNum AND (rsv.fromDate > '$ToDate' OR rsv.toDate < '$FromDate')";
                                        $stid = oci_parse($db_conn, $sql);
                                        oci_execute($stid);

                                        $RoomNumber = oci_fetch_array($stid);
                                        $RoomNumber = $RoomNumber['MAXRNUM'];
                                        // echo $RoomNumber;

                                        // if such a room is available insert reservation into reservation table
                                        if ($RoomNumber) {
                                            $sql = "INSERT INTO Reservation (RNUM, CCNUM, FROMDATE, TODATE, STAYID) VALUES ($RoomNumber, $CreditCardNumber, '$FromDate', '$ToDate', NULL)";
                                            $stid = oci_parse($db_conn, $sql);
                                            oci_execute($stid);

                                            // retrieve confirmation number to display later
                                            $sql = "SELECT confNo FROM Reservation WHERE rNum=$RoomNumber AND fromDate='$FromDate' AND toDate='$ToDate'";
                                            $stid = oci_parse($db_conn, $sql);
                                            oci_execute($stid);

                                            $ConfirmationNumber = oci_fetch_array($stid);
                                            $ConfirmationNumber = $ConfirmationNumber['CONFNO'];
                                            // echo $ConfirmationNumber;
                                        } else {
                                            // else throw error
                                            echo "<div class='alert alert-danger alert-dismissable'>";
                                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                            echo "<strong>The selected room type is not available for your selected dates.</strong>";
                                            echo "</div>";
                                        }
                                    }
                                }
                            }

                            ?>

                            <form action="userCreate.php" method="POST">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                                    <input type="text" class="form-control" name="client-name" placeholder="Name">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fw fa-calendar-plus-o"></i></span>
                                    <input type="date" class="form-control" name="start-date" placeholder="Start date">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fw fa-calendar-times-o"></i></span>
                                    <input type="date" class="form-control" name="end-date" placeholder="End date">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fw fa-home"></i></span>
                                    <?php
                                    // select roomtypes offered by the hotel
                                    $sql = "SELECT rType FROM RoomType";
                                    $stid = oci_parse($db_conn, $sql);
                                    oci_execute($stid);

                                    // display vector of roomtypes as roomtype options
                                    echo "<select id='room-type' class='form-control' name='room-type'>";
                                    echo "<option disabled selected value>Select a Room Type</option>";
                                    while ($row = oci_fetch_array($stid)) {
                                        echo "<option value='".$row['RTYPE']."'>".$row['RTYPE']."</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fw fa-phone"></i></span>
                                    <input type="text" class="form-control" name="client-phone" placeholder="Phone Number">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fw fa-credit-card"></i></span>
                                    <input type="text" class="form-control" name="cc-num" placeholder="Credit Card Number">
                                </div>
                                <br>
                                <div class="form-group" align="right">
                                    <button type="submit" id="userCreateSubmit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="page-header">Confirmation</h1>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Confirmation Number</th>
                                        <th>Name</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Room Type</th>
                                        <th>Contact Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php 
                                    // TODO: Only display this if the reservation was inserted into the database
                                        echo "<td>$ConfirmationNumber</td>";
                                        echo "<td>$ClientName</td>"; 
                                        echo "<td>$FromDate</td>";
                                        echo "<td>$ToDate</td>";
                                        echo "<td>$RoomType</td>";
                                        echo "<td>$PhoneNumber</td>";
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <div align="right">
                                <a href="#"><small>Email this confirmation</small></a><br>
                                <a href="#"><small>Print this confirmation</small></a>
                            </div>
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
