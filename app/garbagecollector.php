<?php
	//this file contains server side code which deletes empty tables ie rooms with no participants
	
	$conf_reference = $_POST['dataID'];
	//define where you want the server side error messages to go
	//set up some error handling and debugging tools
	function logError($msg, $errorD){
		error_log(print_r($msg . "\n", TRUE), 3, $errorD);
	}

	$error_destination = "disposal.txt";
	logError($conf_reference, $error_destination);

	
	//connect to hydra database
	$con=mysqli_connect("internal-db.s160990.gridserver.com", "db160990_hydra", "testConf92", "db160990_hydraChat");
	//$con=mysqli_connect("localhost", "root", "genius", "hydra");
	if(mysqli_connect_errno()){
		logError("Error connecting to database.", $error_destination);
	}
	//make statement
	$sql = "SELECT * FROM " . $conf_reference;
	//make selection
	$result = mysqli_query($con, $sql)
		or die("Error: ".mysqli_error($con));
	//get row data
	$row = mysqli_fetch_array($result);
	
	//if table is empty delete table from database.
	if(!$row){
		logError("Table is empty deleting " . $conf_reference, $error_destination);
		mysqli_query($con, "DROP TABLE " . $conf_reference);
	}
	//close connection
	mysqli_close($con);
?>
