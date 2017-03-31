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
        <script src="main.js"></script>
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
                    <li class="active">
                        <a href="searchRoom.php"><i class="fa fa-fw fa-bed"></i> Room search</a>
                    </li>
                    <li>
                        <a href="clientRoomSearch.php"><i class="fa fa-fw fa-address-card"></i> Client-room search</a>
                    </li>
                    <li>
                        <a href="manageDiscounts.php"><i class="fa fa-fw fa-usd"></i> Manage Discounts &nbsp;&nbsp;<i class="fa fa-lock"></i></a>
                    </li>
                    <li>
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
                                Room Search
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    Search for a room or a floor of rooms to see the room number joined with its room type.
                                </li>
                            </ol>

                            <form action = "searchRoom.php" method = "post">

                                <div class="form-group">
                                    <div class="radio" id="clientSearchRadio">
                                        <input type="radio" name="roomSearchRadio" value="floor">
                                        <strong>Floor:</strong>
                                        <select class="form-control" type="number" id="floorNumValue" name="floorValue">
                                            <option value="1">1</option>
					    <option value="2">2</option>
					    <option value="3">3</option>
                                        </select>
					<br>
                                        <input type="radio" name="roomSearchRadio" value="roomNumber">
                                        <strong>Or room number:</strong>
                                        <input type="text" name="searchbyRoom" class="form-control" placeholder="Eg. 123" id="roomNumValue">
                                    </div>
                                </div><hr>
                                <div class="form-group" align="right">
                                    <button type="submit" id="roomSearchSubmit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="page-header">Results</h1>
                            <div id="resultsTable" class="table-responsive">
                                <!--<table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>Visits</th>
                                        <th>% New Visits</th>
                                        <th>Revenue</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                    </tr>
                                    </tbody>
                                </table>-->

<?php
include('db.php');

if ($db_conn) {
  	echo "Successfully connected to Oracle"."<br>";

	if($_POST["roomSearchRadio"]=="floor"){
		$var1 = $_POST["floorValue"];
		$minfloor = $var1 * 100 - 1;
		$maxfloor = ($var1 + 1) * 100;
//        $result = DB::getInstance()->executePlainSQL("select * from room where rnum >". $minfloor." and rnum<".$maxfloor);
        $result = DB::getInstance()->executePlainSQL("SELECT r.rNum, rt.rPrice FROM Room r, RoomType rt WHERE r.rType=rt.rType AND rnum >". $minfloor." and rnum<".$maxfloor);
		DB::getInstance()->printResultDynamic($result, ["Room #", "Room Type Price ($)"]);
		//echo $floorNoString;
	}

	//if(isset( $_POST["roomSearchRadioNumber"])){
    if($_POST["roomSearchRadio"]=="roomNumber"){
		$var2 =  $_POST["searchbyRoom"];
		if ($var2 == "") {
//            echo "ERROR: Please enter room number";
            echo "<div id='authError' class='alert alert-danger'><strong>ERROR</strong> Please enter room number</div>";
        } else {
            $roomstring = "$var2";
//            $querystring = "select * from room where rnum = " . $roomstring;
            $querystring = "SELECT r.rNum, rt.rPrice FROM Room r, RoomType rt WHERE r.rType=rt.rType AND rnum = " . $roomstring;
            $result = DB::getInstance()->executePlainSQL($querystring);
            DB::getInstance()->printResultDynamic($result, ["Room #", "Room Type Price ($)"]);
        }
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
