<?php
//this file contains server side code which gets the details of room selected in drop down list and returns table of details
  $q = $_GET['q'];
  //define where you want the server side error messages to go
  $error_destination = "capacitydetails.txt";

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

  //extract the max participants of this table from the database
  $sql1 ="SELECT TABLE_COMMENT 
      FROM INFORMATION_SCHEMA.TABLES
      WHERE TABLE_NAME = '" . $q . "'";
  $comment = mysqli_query($con, $sql1)
    or die("Error: ".mysqli_error($con));
  $capacity = mysqli_fetch_array($comment);

  //echo it.
  echo $capacity["TABLE_COMMENT"];

  
  //close connection
  mysqli_close($con);
?>