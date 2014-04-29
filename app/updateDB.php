<?php 
	//this file contains server side code to update database on creation of new conference
	//get the data and store in variables
	$conf_name = $_POST["confName"];
	$participant_count = $_POST["confPeople"];

	//define where you want the server side error messages to go
	$error_destination = "updatedb.txt";

	//set up some error handling and debugging tools
	function logError($msg, $errorD){
		error_log(print_r($msg . "\n", TRUE), 3, $errorD);
	}
	
	logError($conf_name, $error_destination);

	//connect to hydra database
	$con=mysqli_connect("internal-db.s160990.gridserver.com", "db160990_hydra", "testConf92", "db160990_hydraChat");
	//$con=mysqli_connect("localhost", "root", "genius", "hydra");
	if(mysqli_connect_errno()){
		logError("Error connecting to database.", $error_destination);
	}

	//create conference room
	$sql="CREATE TABLE " . $conf_name . "(UserName varchar(40), UUID varchar(20), ConnectionStub varchar(40), 
		LinkedTo varchar(40), WhisperingTo varchar(40), ConnectionRole varchar(40))";
	if(mysqli_query($con, $sql)){
		logError("Table by the name of " . $conf_name . " created.", $error_destination);
		//attach max participants as a comment to the table.
		mysqli_query($con, "ALTER TABLE " . $conf_name . " COMMENT = '" . $participant_count . "'");
	}
	else{
		logError("Could not create table " . $conf_name, $error_destination);
	}

	mysqli_close($con);

?>
