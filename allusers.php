<html>
	<body>
		<?php
   //        	$servername = "mysql";
   //          $username = "archerlml";
   //        	$password = "081152016";
   //        	$dbname = "company";
   //        	// Create connection
   //        	$query = "SELECT * FROM user ";
   //        	$conn = new mysqli($servername, $username, $password, $dbname);
   //         	// Check connection
   //        	if ($conn->connect_error) {
   //             die("Connection failed: " . $conn->connect_error);
   //        	}
   //        	$result = $conn->query($query);
          
   //        	if ($result->num_rows > 0) {
			//   // output data of each row
			//   	while($row = $result->fetch_assoc()) {
			//     	echo "id: " . $row["id"]. " firstname : " . $row["firstname"]. " lastname : " . $row["lastname"]. " email : " . $row["email"]. " address : " . $row["address"]. " homephone : " . $row["homephone"]. " cellphone : " . $row["cellphone"]. "<br>";
			//   	}
		 //  	} else {
			// 	echo "0 results";
		 //  	}
			// $conn->close();
			// another two companies
			// echo "<h3><blockquote><strong>Second Company's Users</strong></blockquote></h3>";
			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, "http://www.mingxiaoguo.com/GetAllUsers.php");
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_HEADER, 0);
			// $output = curl_exec($ch);
			// curl_close($ch);
			// print_r($output);
			//--------------------------------
			$ch1 = curl_init();
			curl_setopt($ch1, CURLOPT_URL, "http://localhost/marketplace/database.php");
			curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch1, CURLOPT_HEADER, 0);
			$result = curl_exec($ch1);
			curl_close($ch1);
			// echo $result;
			// echo $result[1];
			$cut = explode("<br />", $result);
			// echo $_SERVER['QUERY_STRING']."<br/>";
			$flag = false;
			for ($i = 0; $i < count($cut) - 1; $i++) {
				echo $cut[$i]."<br />";
			}
			// if (!$flag) {
			// 	header("Location: http://www.captainlongxu.com/login.html");
			// }
        ?>
	</body>
</html>