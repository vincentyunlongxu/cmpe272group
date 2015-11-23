<?php
  session_start();
  $servername = "localhost";
	$username = "captajc5_group";
	$password = "CMPE272";
	$dbname = "captajc5_group";
	$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
	if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	}
	$query = "SELECT * FROM Track";

 	$result = $conn->query($query);
  	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	    echo $row["type"].", ".$row["content"]."<br />";
	  }
	} else {
	  echo "0 results";
	}
  $conn->close();
?>