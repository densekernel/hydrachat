<?php
//set php limit so that long polling will work without premature timeout.
set_time_limit(180);
$confname = $_GET['confname'];
$devices = $_GET['devices'];

$error_destination = "callstager.txt";

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

//simply count number of devices present in room and echo it
$sql = "SELECT COUNT(*) FROM " . $confname;
$result = mysqli_fetch_array(mysqli_query($con, $sql));
$currentdevices = $result['COUNT(*)'];

while($currentdevices == $devices){
	sleep(1);
	$result = mysqli_fetch_array(mysqli_query($con, $sql));
	$currentdevices = $result['COUNT(*)'];
}

echo $currentdevices;

mysqli_close($con);


?>