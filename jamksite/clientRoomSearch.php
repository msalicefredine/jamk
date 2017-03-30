
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
                <a class="navbar-brand" href="searchClient.php">Hotel JAMK - Admin Panel</a>
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
                    <li class="active">
                        <a href="clientRoomSearch.php"><i class="fa fa-fw fa-address-card"></i> Client-room search</a>
                    </li>
                    <li>
                        <a href="manageDiscounts.php"><i class="fa fa-fw fa-usd"></i> Manage Discounts &nbsp;&nbsp;<i class="fa fa-lock"></i></a>
                    </li>
                    <li>
                        <a href="manageRooms.php"><i class="fa fa-wrench"></i>&nbsp;Manage Rooms&nbsp;&nbsp; <i class="fa fa-lock"></i></a>
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
                            Client-Room Search
                        </h1>

                        <ol class="breadcrumb">
                            <li class="active">
                                Find all clients who have stayed in <strong>every</strong> selected room type.
                            </li>
                        </ol>
                        <!--<form action="clientRoomSearch.php" method="post">
                            Name: <input type="text" name="name"><br>
                            E-mail: <input type="text" name="email"><br>
                            <input type="submit">
                        </form>-->
                        <form action="clientRoomSearch.php" method = "post">
                        <?php
                        include('db.php');

                        $sql = 'select rtype from roomtype';
                        $result = DB::getInstance()->executePlainSQL($sql);
                        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                        	echo '<div class="checkbox">';
                                echo '<label><input type="checkbox" name="'.$row["RTYPE"].'" value="'.$row["RTYPE"].'">'.$row["RTYPE"].' Room</label>';
                            echo '</div>';
                        }
                           //  <div class="checkbox">
//                                 <label><input type="checkbox" name="clientRoomCheckbox1" value="junior">Junior Room</label>
//                             </div>
//                             <div class="checkbox">
//                                 <label><input type="checkbox" name="clientRoomCheckbox2" value="deluxe">Deluxe Room</label>
//                             </div>
//                             <div class="checkbox">
//                                 <label><input type="checkbox" name="clientRoomCheckbox3" value="queen">Queen Suite</label>
//                             </div>
//                             <div class="checkbox">
//                                 <label><input type="checkbox" name="clientRoomCheckbox4" value="premium">Premium Suite</label>
//                             </div>
//                             <hr>
                            echo '<div class="form-group" align="right">';
                                echo '<button type="submit" id="clientRoomSearchSubmit" class="btn btn-primary btn-block">Search</button>';
                            echo '</div>';
                            ?>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="page-header">Results</h1>
                        <div id="resultsTable" class="table-responsive">
<?php

if ($db_conn) {
  	// echo "Successfully connected to Oracle"."<br>";
	$roomtypes = "";
	$count = 0;
	$sql = 'select rtype from roomtype';
    $result = DB::getInstance()->executePlainSQL($sql);
	while($room = OCI_Fetch_Array($result, OCI_BOTH)) {
		if(isset($_POST[$room["RTYPE"]])) {
			$roomtypes = $roomtypes."'".$room["RTYPE"]."',";
			$count++;
		}
	}

	$roomtypes = rtrim($roomtypes,",");
	$initialcount = $count;

	// echo $roomtypes;
	if($initialcount > 0){
	    // $querystring = "select * from client where ccNum in (select r.ccNum from stay s, reservation r, room rm where s.stayid = r.stayid and r.rNum = rm.rNum and rm.rType in (".$roomtypes."))";
	    $querystring = "SELECT * FROM Client c WHERE NOT EXISTS ((SELECT DISTINCT rtype FROM Roomtype where rtype in (".$roomtypes.")
	    MINUS (SELECT rmm.rtype FROM Reservation res inner join Room rmm on res.rnum=rmm.rnum where res.ccnum=c.ccnum and stayid is not null)))";
	    // echo $querystring;
        $result = DB::getInstance()->executePlainSQL($querystring);
	echo "<table class='table table-hover'>";
	echo "<thead><tr><th>Client Name</th><th>Phone No</th></tr></thead>";
	echo "<tbody>";
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr>";
		echo "<td>".$row["NAME"]."</td><td>".$row["PNUM"]."</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	}
  	OCILogoff($db_conn);
} else {
  	echo '<div class="alert alert-danger alert-dismissable">';
	echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo '<strong>Oracle Connect Error! </strong>';
		$e = OCI_Error(); // For OCIParse errors pass the
		// connection handle
		echo htmlentities($e['message']);
	echo "</div>";
}
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

</body>

</html>
