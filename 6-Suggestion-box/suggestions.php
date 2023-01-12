<?php
    $ip = "localhost";
	  $user = "smartcities";
	  $pass = "tecnun";
	  $database = "SMARTCITIES";
	  $connection = mysqli_connect($ip, $user, $pass, $database);

	  if($connection == false) {
		  echo "Connection failed";
	  }
	
    // Get the post records
    $txtName = $_POST['txtName'];
    $txtEmail = $_POST['txtEmail'];
    $txtIssue = $_POST['txtIssue'];
    $txtMessage = $_POST['txtMessage'];

    // Database insert SQL code
    $sql = "INSERT INTO `SUGGESTIONS` (`ID`, `Name`, `Email`, `Issue`, `Message`) VALUES ('0', '$txtName', '$txtEmail', '$txtIssue', '$txtMessage')";

    // Insert in database 
    $rs = mysqli_query($connection, $sql);

    if($rs)
    {
	    echo "Suggestion was successfully inserted into database!";
    }
?>
