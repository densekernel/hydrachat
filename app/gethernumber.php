<?php
	
	$uuid = $_GET['mynumber'];
	$confname = $_GET['room'];

	//define where you want the server side error messages to go
	//set up some error handling and debugging tools
	function logError($msg, $errorD){
		error_log(print_r($msg . "\n", TRUE), 3, $errorD);
	}

	$error_destination = "gethernumber.txt";

	
	//connect to hydra database
	$con=mysqli_connect("internal-db.s160990.gridserver.com", "db160990_hydra", "testConf92", "db160990_hydraChat");
	//$con=mysqli_connect("localhost", "root", "genius", "hydra");
	if(mysqli_connect_errno()){
		logError("Error connecting to database.", $error_destination);
	}

	$sql = "SELECT * FROM " . $confname . " WHERE UUID = '" . $uuid . "'";
	$result = mysqli_fetch_array(mysqli_query($con, $sql));

	$hernumber = $result['ConnectionStub'];
	$myrole = $result['ConnectionRole'];
	$hername = $result['LinkedTo'];

	echo json_encode(array("stub"=>$hernumber, "role"=>$myrole, "peer"=>$hername));	

	mysqli_close($con);

?>
