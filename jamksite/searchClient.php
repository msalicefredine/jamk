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

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
                    <li class="active">
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
                    <li>
                        <a href="manageRooms.php"><i class="fa fa-wrench"></i>&nbsp; Manage Rooms&nbsp;&nbsp;<i class="fa fa-lock"></i></a>
                    </li>
                    <li style="vertical-align: bottom">
                        <a href="userCreate.php"><i class="fa fa-user-secret"></i>&nbsp; Preview Client Interface</a>
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
                        <form class="form-horizontal" action="searchClient.php" method = "post">
                            <!--<div class="radio" id="clientSearchRadio">
                                <label><input type="radio" name="clientSearchRadioAll" value="all">Get All</label><br>
                                <label><input type="radio" name="clientSearchRadioName" value="name">Name</label><br>
                                <label><input type="radio" name="clientSearchRadioNumber" value="phone">Phone Number</label>
                            </div>-->
                            <h4>Find clients by...</h4>



                            <select name="allOrSearch">
                                <option selected value="allChecked">Get All</option>
                                <option value="searchByChecked">Search By...</option>
                            </select><br><br>
                            <h4>Search by options</h4>
                            <strong><input type="checkbox" name="nameChecked"> Client Name: </strong>
                            <input type="text" id="client-name" name ="filterName" placeholder="Eg. John"><br><br>
                            <strong><input type="checkbox" name="numberChecked"> Phone Number: </strong>
                            <input type="text" id="client-phone" name = "filterNo" placeholder="Eg, 555">
                            <br><h4>Fields to display</h4>
                            <input type="checkbox" name="toDisplayName" checked="checked"> Name <br>
                            <input type="checkbox" name="toDisplayNum" checked="checked"> Phone Number
                            <hr>
                            <div class="form-group" align="right">
                                <button type="submit" class="btn btn-primary btn-block" id="clientSearchSubmit">Search</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-6">
                    <h1 class="page-header">Results</h1>
                        <div id="resultsTable" class="table-responsive">


<?php
include('db.php');

if ($db_conn) {
  	// echo "Successfully connected to Oracle"."<br>";

    if (isset($_POST["toDisplayName"]) && isset($_POST["toDisplayNum"])){
        $display_fields = "Name, pNum";
        $table_print = ["Client Name", "Phone Number"];
    } else if(isset($_POST["toDisplayName"])){
        $display_fields = "Name";
        $table_print = ["Client Name"];
    } else if (isset($_POST["toDisplayNum"])){
        $display_fields = "pNum";
        $table_print = ["Phone Number"];
    } else {
        $display_fields = "Name, pNum";
        $table_print = ["Client Name", "Phone Number"];
    }
	if(($_POST["allOrSearch"])=="allChecked"){

	$result = DB::getInstance()->executePlainSQL("select ".$display_fields." from Client");
	DB::getInstance()->printResultDynamic($result, $table_print);

	}

	else{

	if(isset($_POST["nameChecked"]) || isset($_POST["numberChecked"])){
		if(isset($_POST["nameChecked"]) && isset($_POST["numberChecked"])){
			$name = $_POST["filterName"];
			$number = $_POST["filterNo"];
			$result = DB::getInstance()->executePlainSQL("select ".$display_fields." from Client where LOWER(name)= LOWER('".$name."') and pNum = '".$number."'");
			DB::getInstance()->printResultDynamic($result, $table_print);
		}
		else if(isset($_POST["nameChecked"])){
			$name = $_POST["filterName"];
			$result = DB::getInstance()->executePlainSQL("select ".$display_fields." from Client where LOWER(name)= LOWER('".$name."')");
			DB::getInstance()->printResultDynamic($result, $table_print);
		}
		else{

			$number = $_POST["filterNo"];
			$result = DB::getInstance()->executePlainSQL("select ".$display_fields." from Client where pNum LIKE '%".$number."%'");
			DB::getInstance()->printResultDynamic($result, $table_print);
		}
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
