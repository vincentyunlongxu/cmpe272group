<?php
  session_start();
  extract($_POST);
  if($USERNAME){
    $servername = "localhost";
  	$username = "captajc5_group";
  	$password = "CMPE272";
  	$dbname = "captajc5_group";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $update = "UPDATE UserInfo SET status = 0  WHERE username = '$USERNAME'";
    $result = $conn->query($update);
    session_unset();
  }
  header("Location: http://www.captainlongxu.com/marketplace/index.php");
?>