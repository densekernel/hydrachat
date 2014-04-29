<?php
	//this file contains server side code which deletes empty tables ie rooms with no participants
	
	$username = $_GET['user'];
	$confname = $_GET['confname'];
	$whisperingto = $_GET['whisperingto'];

	//define where you want the server side error messages to go
	//set up some error handling and debugging tools
	function logError($msg, $errorD){
		error_log(print_r($msg . "\n", TRUE), 3, $errorD);
	}

	$error_destination = "updatewhisper.txt";

	
	//connect to hydra database
	$con=mysqli_connect("internal-db.s160990.gridserver.com", "db160990_hydra", "testConf92", "db160990_hydraChat");
	//$con=mysqli_connect("localhost", "root", "genius", "hydra");
	if(mysqli_connect_errno()){
		logError("Error connecting to database.", $error_destination);
	}

	$sql = "UPDATE " . $confname . " SET WhisperingTo = '" . $whisperingto . "' WHERE UserName = '" . $username . "'";
	$sql2 = "UPDATE " . $confname . " SET WhisperingTo = '" . $username . "' WHERE UserName = '" . $whisperingto . "'";

	if(mysqli_query($con, $sql)){
		logError("Whisper added: " . $username . $whisperingto, $error_destination);
		mysqli_query($con, $sql2);
	}else{
		logError("Whisper failed " . $username, $error_destination);
	}

?>