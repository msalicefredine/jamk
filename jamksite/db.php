<?php

$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = dbhost.ugrad.cs.ubc.ca)(PORT = 1522)))(CONNECT_DATA=(SID=ug)))";
$db_conn = OCILogon("ora_r8y8", "a21468137", $db);

class DB {

	private static $instance = null;

	public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
	//echo "<br>running ".$cmdstr."<br>";
	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

	if (!$statement) {
	// TODO: Display good message
	echo '<div class="alert alert-danger alert-dismissable">';
	echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo '<strong>Database Error! </strong>';
		echo "Cannot parse the following command: " . $cmdstr . "<br>";
		$e = OCI_Error($db_conn); // For OCIParse errors pass the
		// connection handle
		echo htmlentities($e['message']);
	echo "</div>";
		$success = False;
	}

	$r = OCIExecute($statement, OCI_DEFAULT);
	if (!$r) {
	// TODO: Update error message
	echo '<div class="alert alert-danger alert-dismissable">';
	echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo '<strong>Database Error! </strong>';
		echo "Cannot execute the following command: " . $cmdstr . "<br>";
		$e = oci_error($statement); // For OCIExecute errors pass the statementhandle
		echo htmlentities($e['message']);
		echo "</div>";
		$success = False;
	} else {

	}
	return $statement;

}

}

?>