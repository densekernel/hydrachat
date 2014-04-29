<?php
	//this file contains server side code which deletes empty tables ie rooms with no participants
	
	$username = $_GET['q'];
	$confname = $_GET['f'];
	$confpeople = $_GET['g'];
	$uuid = $_GET['h'];

	//define where you want the server side error messages to go
	//set up some error handling and debugging tools
	function logError($msg, $errorD){
		error_log(print_r($msg . "\n", TRUE), 3, $errorD);
	}

	$error_destination = "adduserdevice.txt";

	
	//connect to hydra database
	$con=mysqli_connect("internal-db.s160990.gridserver.com", "db160990_hydra", "testConf92", "db160990_hydraChat");
	//$con=mysqli_connect("localhost", "root", "genius", "hydra");
	if(mysqli_connect_errno()){
		logError("Error connecting to database.", $error_destination);
	}


	$insert = "INSERT INTO db160990_hydraChat." . $confname . "(UserName, UUID, ConnectionStub,
			LinkedTo, WhisperingTo, ConnectionRole) VALUES ( '" . $username . "', '" . $uuid . "', 'null', 'null', 'null', 'null')";
	

	if(mysqli_query($con, $insert)){
		logError("User added: " . $username, $error_destination);
	}else{
		logError("Could not add User: " . $username, $error_destination);
	}

	//after insertion, scan for suitable peer to connect to. algorithm below does the sorting
	$sql = "SELECT * FROM " . $confname . " WHERE UserName <> '" . $username . "'" . " AND LinkedTo = 'null'";
	$result1 = mysqli_query($con, $sql);
	$final = "";


	while(($potentialrow = mysqli_fetch_array($result1)) && ($final == "")){
		
		$suitablepeer = true;
		$potentialpeer = $potentialrow['UserName'];
		$sqlcheck = "SELECT * FROM " . $confname . " WHERE UserName = '" . $potentialpeer . "' AND LinkedTo <> 'null'";
		$result = mysqli_query($con, $sqlcheck);
		while($rows = mysqli_fetch_array($result)){
			logError("looping...", $error_destination);
			if($rows['LinkedTo'] == $username){
				$suitablepeer = false;
			}
		}

		if($suitablepeer){
		$final = $potentialrow['UUID'];
		}
	}

	//if suitable peer is found, make the connection and generate and share the connection stub.
	if($final != ""){
		$stub = $final . $uuid;
		$constmt1 = "UPDATE " . $confname . " SET ConnectionStub = '" . $stub . "', LinkedTo = '" . $potentialpeer . "', ConnectionRole = 'caller' 
						WHERE UUID = '" . $uuid . "'";

		$constmt2 = "UPDATE " . $confname . " SET ConnectionStub = '" . $stub . "', LinkedTo = '" . $username . "', ConnectionRole = 'receiver' 
						WHERE UUID = '" . $final . "'";

		if(mysqli_query($con, $constmt1)){
			logError("Peer Link added: " . $username . $potentialpeer, $error_destination);
		}else{
			logError("Peer Link Failed " . $username, $error_destination);
		}

		if(mysqli_query($con, $constmt2)){
			logError("Peer Link added: " . $potentialpeer . $username, $error_destination);
		}else{
			logError("Peer Link Failed " . $username, $error_destination);
		}



	}






	mysqli_close($con);
?>