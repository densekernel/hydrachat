<?php
	//this file contains serversidecode to extract all rooms in session and return html list
	//define where you want the server side error messages to go
	$error_destination = "listconf.txt";

	//set up some error handling and debugging tools
	function logError($msg, $errorD){
		error_log(print_r($msg . "\n", TRUE), 3, $errorD);
	}

	//connect to hydra database
	//$con=mysqli_connect("localhost", "root", "genius", "hydra");
	$con=mysqli_connect("internal-db.s160990.gridserver.com", "db160990_hydra", "testConf92", "db160990_hydraChat");
	if(mysqli_connect_errno()){
		logError("Error connecting to database.", $error_destination);
	}
	//make statement
	//remember to change table_schema to appropriate database.
	$sql="SELECT TABLE_NAME 
			FROM INFORMATION_SCHEMA.TABLES
			WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='db160990_hydraChat'";
	//make selection
	$result = mysqli_query($con, $sql);
	//form response to populate drop down list on index page
	while($row = mysqli_fetch_array($result)){
		echo "<option value = '" . $row['TABLE_NAME'] . "'>" . $row['TABLE_NAME'] . "</option>";
	}
	//close connection
	mysqli_close($con);
?>


