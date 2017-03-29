    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - Bootstrap Admin Template</title>

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
                    <li>
                        <a href="userCreate.php"><i class="fa fa-fw fa-bookmark" aria-hidden="true"></i> Create Reservation</a>
                    </li>
                    <li class="active">
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
                            Modify Existing Reservation
                        </h1>

                        <?php
                        include('db.php');

$retrievedReservation = null;
$roomTypes = DB::getInstance()->executePlainSQL("select rtype from Roomtype");

if ($db_conn) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle retrieving reservation
        if (isset($_POST['userRetrieveSubmit'])) {
             // Retrieve Reservation
     		if (isset($_POST['cc-num']) && isset($_POST['conf-num'])) {
     			$ccNum = $_POST['cc-num'];
     			$confNum = $_POST['conf-num'];
    			$result = DB::getInstance()->executePlainSQL("select * from modify_reservation
    			         where ccNum=".$ccNum." and confNo=".$confNum);
    			$retrievedReservation = OCI_Fetch_Array($result, OCI_BOTH);
            }
            unset($_POST['userRetrieveSubmit']);
            // Commit to save changes
            OCI_COMMIT($db_conn);
        } else if (isset($_POST['userModifySubmit'])) {

            // Handle update reservation
            if (isset($_POST['client-name']) && isset($_POST['start-date']) && isset($_POST['end-date'])
                  && isset($_POST['room-type']) && isset($_POST['client-phone'])) {

    			$ccNum=$_POST['client-ccnum'];
    			$confNo=$_POST['res-confno'];
    			$clientName=$_POST['client-name'];
    			$startDate=$_POST['start-date'];
    			$endDate=$_POST['end-date'];
    			$pnum=$_POST['client-phone'];
    			$rtype=$_POST['room-type'];
    			$oldRtype=$_POST['old-roomtype'];

    			// Update client table
    			$clientResult= DB::getInstance()->executePlainSQL("update client set pnum='".$pnum."', name='".$clientName."'
    				where ccNum='".$ccNum."'");
    			/*echo "update client set pnum='".$pnum."', name='".$clientName."'
    				where ccNum='".$ccNum."'";*/

    			// Update reservation
    			$reservationResult= DB::getInstance()->executePlainSQL("update reservation set toDate='".$endDate."',
    			 fromDate='".$startDate."' where confNo='".$confNo."'");

				// Handle updated roomtype (if changed)
				if ($rtype != $oldRtype) {
					// If there's an available room of the new type, update it.
					$rooms = DB::getInstance()->executePlainSQL("select * from room r inner join reservation res on r.rnum=res.rnum
						where r.rtype='".$rtype."' and res.rnum not in
						(select rnum from reservation where ((fromDate <= '".$endDate."') and (toDate >= '".$startDate."')))");
					if ($rooms) {
						// echo 'got some';
						$room = OCI_Fetch_Array($rooms, OCI_BOTH);
						if ($room) {
						    // echo $room["RNUM"];
							$reservationResult= DB::getInstance()->executePlainSQL("update reservation set
							  rNum='".$room["RNUM"]."' where confNo='".$confNo."'");
						} else {
							// Return an error if there are no available rooms of the requested type
							echo '<div class="alert alert-danger alert-dismissable">';
							echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							echo '<strong>We were unable to change your room type! </strong>';
							echo 'There are no avaiable '.$rtype.' rooms.';
							echo "</div>";
						}

					}

				}
				// Commit to save changes
				OCICOMMIT($db_conn);

    			// Get updated reservation so we can display it to the user
    			$updateResult= DB::getInstance()->executePlainSQL("select * from modify_reservation
    			         where ccNum=".$ccNum." and confNo=".$confNo);

    			$updatedRes=OCI_Fetch_Array($updateResult,OCI_BOTH);
    			// Commit to save changes
    			// OCICOMMIT($db_conn);

            }
        }
    }
} else {
 	echo '<div class="alert alert-danger alert-dismissable">';
	echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo '<strong>Oracle Connect Error! </strong>';
		$e = OCI_Error(); // For OCIParse errors pass the
		// connection handle
		echo htmlentities($e['message']);
	echo "</div>";
}

                if ($updatedRes) {
                    echo '<div class="alert alert-success alert-dismissable">';
                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';

                        echo '<h1 class="page-header">Confirmation</h1>';
                        echo '<h5>View your reservation.</h5>';
                        echo '<strong>Your confirmation number is still: '.$updatedRes['CONFNO'].'</strong>';
                        echo '<br>';
                        echo '<div class="table-responsive">';
                           echo '<table class="table table-hover">';
                                echo '<thead>';
                                echo '<tr>';
                                    echo '<th>Name</th>';
                                    echo '<th>Start Date</th>';
                                    echo '<th>End Date</th>';
                                    echo '<th>Room Type</th>';
                                    echo '<th>Contact Number</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                echo '<tr>';
                                    echo '<td>'.$updatedRes['NAME'].'</td>';
                                    echo '<td>'.$updatedRes['FROMDATE'].'</td>';
                                    echo '<td>'.$updatedRes['TODATE'].'</td>';
                                    echo '<td>'.$updatedRes['RTYPE'].'</td>';
                                    echo '<td>'.$updatedRes['PNUM'].'</td>';
                                echo '</tr>';

    							// Logoff when finished


                                echo '</tbody>';
                            echo '</table>';
                            echo '<div align="right">';
                                echo '<a href="#"><small>Email this confirmation</small></a><br>';
                                echo '<a href="#"><small>Print this confirmation</small></a>';
                            echo '</div>';

                        echo '</div>';
                        echo '</div>';
                    }
                    ?>

                        <form class="form-horizontal" action="userModify.php" method ="post">
                            <h3>Retrieve reservation</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-hashtag"></i></span>
                                <input id="conf-num" type="text" class="form-control" name="conf-num" placeholder="Confirmation Number">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-credit-card"></i></span>
                                <input id="cc-num" type="text" class="form-control" name="cc-num" placeholder="Credit Card Number">
                            </div>
                            <br>
                            <div class="form-group" align="right">
                                <button type="submit" name="userRetrieveSubmit" id="userRetrieveSubmit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                        <hr>
                        <h3>Update reservation</h3>
                        <!--Input fields should auto-populate once 'submit' is hit-->
                        <form class="form-horizontal" action="userModify.php" method ="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                                <?php
                                if ($retrievedReservation) {
    								echo '<input id="client-name" type="text" class="form-control" name="client-name" value='.$retrievedReservation["NAME"].'>';
                                } else {
                                    echo '<input id="client-name" type="text" class="form-control" name="client-name" placeholder="Name">';
                                }
                                ?>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar-plus-o"></i></span>
                                <?php
                                if ($retrievedReservation) {
    								echo '<input id="start-date" type="date" class="form-control" name="start-date" value=20'.$retrievedReservation["FROMDATE"].'>';
                                } else {
                                    echo '<input id="start-date" type="date" class="form-control" name="start-date" placeholder="Start date">';
                                }
                                ?>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar-times-o"></i></span>
                                <?php
                                if ($retrievedReservation) {
    								echo '<input id="end-date" type="date" class="form-control" name="end-date" value=20'.$retrievedReservation["TODATE"].'>';
                                } else {
                                    echo '<input id="end-date" type="date" class="form-control" name="end-date" placeholder="End date">';
                                }
                                ?>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-home"></i></span>
                                <?php
                                if ($retrievedReservation) {
                                	$targetType = $retrievedReservation["RTYPE"];
    								echo '<select id="room-type" class="form-control" name="room-type" >';
                                    while ($rtype = OCI_Fetch_Array($roomTypes, OCI_BOTH)) {
                                    	if ($targetType == $rtype["RTYPE"]) {
                                    		echo '<option selected="selected" value="'.$targetType.'">'.$targetType.'</option>';
                                    	} else {
                                    		echo '<option value="'.$rtype["RTYPE"].'">'.$rtype["RTYPE"].'</option>';
                                    	}
                                    }
                                    echo '</select>';
                                } else {
                                    echo '<select id="room-type" class="form-control" name="room-type" >';
                                    echo '<option selected disabled>Select a Room Type</option>';
                                    while ($rtype = OCI_Fetch_Array($roomTypes, OCI_BOTH)) {
                                    	echo '<option value="'.$rtype["RTYPE"].'">'.$rtype["RTYPE"].'</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-phone"></i></span>
                                <?php
                                if ($retrievedReservation) {
    								echo '<input id="client-phone" type="text" class="form-control" name="client-phone" value='.$retrievedReservation["PNUM"].'>';
                                } else {
                                    echo '<input id="client-phone" type="text" class="form-control" name="client-phone" placeholder="Phone Number">';
                                }
                                ?>
                            </div>
                            <?php
                             echo '<input type="hidden" id="client-ccnum" name="client-ccnum" value='.$retrievedReservation["CCNUM"].' >';
                             echo '<input type="hidden" id="res-confno" name="res-confno" value='.$retrievedReservation["CONFNO"].' >';
                             echo '<input type="hidden" id="old-roomtype" name="old-roomtype" value='.$retrievedReservation["RTYPE"].' >';
                            ?>
                            <br>
                            <?php
                            unset($retrievedReservation);
                            ?>
                            <div class="form-group" align="right">
                                <button type="submit" name="userModifySubmit" id="userModifySubmit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
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

    <!-- <script src="js/main.js"></script> -->

    </body>

    </html>

<?php
OCILogoff($db_conn);
?>