<?php

$confname = $_POST['confname'];
$user = $_POST['user'];
$device = $_POST['device'];

$error_destination = "removeuser.txt";

//set up some error handling and debugging tools
function logError($msg, $errorD){
	error_log(print_r($msg . "\n", TRUE), 3, $errorD);
}

logError($device, $error_destination);
//connect to hydra database
//$con=mysqli_connect("localhost", "root", "genius", "hydra");
$con=mysqli_connect("internal-db.s160990.gridserver.com", "db160990_hydra", "testConf92", "db160990_hydraChat");
if(mysqli_connect_errno()){
	logError("Error connecting to database.", $error_destination);
}

//prepare key used to id connected peer
$presql = "SELECT ConnectionStub FROM " . $confname . " WHERE UUID = '" . $device . "'";
$preresult = mysqli_fetch_array(mysqli_query($con, $presql));
$deletionkey = $preresult['ConnectionStub'];


//delete specific device identified by uuid
$sql = "DELETE FROM " . $confname . " WHERE UserName = '" . $user . "'" . " AND UUID = " . "'" . $device . "'";
if(mysqli_query($con, $sql)){
		//reset the connected peer if connected. 
		logError("user " . $user . $device . " deleted.", $error_destination);

		if($deletionkey != "null"){
			$sql3 = "UPDATE " . $confname . " SET ConnectionStub = 'null', LinkedTo = 'null', ConnectionRole = 'null', WhisperingTo = 'null' WHERE ConnectionStub = '" . $deletionkey . "'";
			mysqli_query($con, $sql3);
		}
	}
	else{
		logError("could not delete user " . $user . $device, $error_destination);
	}

/*$sql2 = "SELECT * FROM " . $confname;
	//make selection
$result = mysqli_query($con, $sql2)
		or die("Error: ".mysqli_error($con));
	//get row data
$row = mysqli_fetch_array($result);
	
	//if table is empty delete table from database.
if(!$row){
		logError("Table is empty deleting " . $confname, $error_destination);
		mysqli_query($con, "DROP TABLE " . $confname);
}*/

mysqli_close($con);

?>