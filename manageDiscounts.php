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
                        <a href="index.html"><i class="fa fa-fw fa-user-circle" aria-hidden="true"></i> Client search</a>
                    </li>
                    <li>
                        <a href="roomSearch.html"><i class="fa fa-fw fa-bed"></i> Room search</a>
                    </li>
                    <li>
                        <a href="clientRoomSearch.html"><i class="fa fa-fw fa-address-card"></i> Client-room search</a>
                    </li>
                    <li class="active">
                        <a href="manageDiscounts.html"><i class="fa fa-fw fa-usd"></i> Manage Discounts &nbsp;&nbsp;<i class="fa fa-lock"></i></a>
                    </li>
                    <li>
                        <a href="manageRooms.html"><i class="fa fa-wrench"></i>&nbsp; Manage Rooms&nbsp;&nbsp; <i class="fa fa-lock"></i></a>
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
                            Manage Discounts
                        </h1>

                        <div class="alert alert-danger">
                                <strong>Managers only</strong> - code is required
                        </div>

                        <form action="manageDiscounts.php" method="post">
                            <div class="input-group">
                                <span class="input-group-addon">Authorization Code</span>
                                <input id="managerAuth" type="text" class="form-control" name="auth">
                            </div>
                            <hr>
                            <h3>Get Discount Reports</h3>
                            <ol class="breadcrumb">
                                <li class="active">
                                    Run reports grouped by minimum or maximum average discount rates.
                                </li>
                            </ol>
                            <div class="checkbox">
                                <label><input name="discountsRadio" checked="checked" type="radio" value="min"> Minimum average discount</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="discountsRadio" type="radio" value="max"> Maximum average discount</label>
                            </div>
                            <br>
                            <hr>
                            <div class="form-group" align="right">
                                <button type="submit" id="manageDiscountsSubmit" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="page-header">Results</h1>
                        <div id="authError" class="alert alert-danger" style="display:none;">
                            <strong>ERROR</strong> Invalid manager authorization code
                        </div>
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
$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = dbhost.ugrad.cs.ubc.ca)(PORT = 1522)))(CONNECT_DATA=(SID=ug)))";
$db_conn = OCILogon("ora_d8c0b", "a33056145", $db);





function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
	//echo "<br>running ".$cmdstr."<br>";
	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

	if (!$statement) {
		echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
		$e = OCI_Error($db_conn); // For OCIParse errors pass the       
		// connection handle
		echo htmlentities($e['message']);
		$success = False;
	}

	$r = OCIExecute($statement, OCI_DEFAULT);
	if (!$r) {
		echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
		$e = oci_error($statement); // For OCIExecute errors pass the statementhandle
		echo htmlentities($e['message']);
		$success = False;
	} else {

	}
	return $statement;

}


function printResult($result) { //prints results from a select statement
	echo "<table class='table table-hover table-striped'>";
	echo "<thead><tr><th>Employee Name</th><th>Employee ID </th><th>Average Discount</th></tr></thead>";
	echo "<tbody>";
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		$number = count($row);
		echo "<tr>";
		for($i = 0; $i < $number; $i++)
			echo "<td>".$row[$i]."</td>";
	
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

}

if (db_conn) {
  	echo "Successfully connected to Oracle"."<br>";
        $result = executePlainSQL("select e.name, d.eid, AVG(d.amount) from employee e, discounts d where e.eid = d.eid group by e.name, d.eid");

	printResult($result);
	
  	OCILogoff($db_conn);
} else {
  	$err = OCIError();
  	echo "Oracle Connect Error " . $err['message'];
}
?>

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
