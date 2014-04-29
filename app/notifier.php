<?php
//server side code for event based sending of information,
//this scripts periodically counts the number of rooms in the db 
//and then sends this number to indexDBConnector which resides on index.php 
//this allows live list refreshing without having to reload browser. 
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$error_destination = "notifier.txt";

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
$sql="SELECT COUNT(*) 
	FROM INFORMATION_SCHEMA.TABLES
	WHERE TABLE_SCHEMA ='db160990_hydraChat'";
//make selection
$result = mysqli_query($con, $sql);
$count = mysqli_fetch_array($result);
//get results
$return = $count['COUNT(*)'];

//echo and flush down stream
function sendMsg($msg){
	echo "data: $msg" . PHP_EOL;
	echo PHP_EOL;
	ob_flush();
	flush();
}

sendMsg($return);
//close connection
mysqli_close($con);


?>