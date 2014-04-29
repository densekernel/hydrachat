<?php
//this file contains server side code which gets the details of room selected in drop down list and returns table of details
  $q = $_GET['q'];
  //define where you want the server side error messages to go
  $error_destination = "condetails.txt";

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

  //extract all user details from the database.
  $currentuser = "";
  $devicecount = 0;
  //create table with id roomdata that displays room name and max participants
  echo "<table id = 'roomdata'>
  <tr>
  <th>Room Name</th>
  <th>Max Participants</th>
  </tr><tr>
  <td>". $q . "</td><td>" . $capacity['TABLE_COMMENT'] . "</td></tr>";

  echo "</table>";

  //create list of users present in the room
  echo "<table id = 'users'>
  <tr>
  <th>People Inside</th>
  <th>No. of Devices</th>
  </tr>";
  $sql2 = "SELECT * FROM " . $q . " ORDER BY UserName";
  $users = mysqli_query($con, $sql2)
    or die("Error: ".mysqli_error($con));
  //while loop that does not repeat listing user names while counting number of devices each user has
  while($userdetails = mysqli_fetch_array($users)){

    if($currentuser != $userdetails['UserName']){
      if($currentuser != ""){
        echo "<tr>";
        echo "<td>" . $currentuser . "</td>";
        echo "<td>" . $devicecount . "</td>";
        echo "</tr>";

      }
      $currentuser = $userdetails['UserName'];
      $devicecount = 1;

    }
    else{
      $devicecount = $devicecount + 1;
    }
  }
  //print off the last user
  if($currentuser != ""){
    echo "<tr>";
    echo "<td>" . $currentuser . "</td>";
    echo "<td>" . $devicecount . "</td>";
    echo "</tr>";
  }


  echo "</table>";
  
  //close connection
  mysqli_close($con);
?>
