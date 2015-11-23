<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-2.1.1.js"></script> 
  <script>
    $(document).ready(function(){ 
        $("head").load("header.html"); 
    }); 
    $(document).ready(function(){ 
        $("#banner").load("banner.php"); 
    }); 
    $(document).ready(function(){ 
        $("#footer").load("footer.html"); 
    });
  </script>
</head>
<body>
<div id="banner"></div>
<div class="container" style="height:700px;">
  <div class="row">
    <div class="col-md-12">
      <div id="err_msg_block" class="alert alert-danger hidden" role="alert">
        <button id="err_msg_close" type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <p id="err_msg"></p>
      </div>
    </div>
    <div class="col-md-12">
      <blockquote>
        <h3>Review</h3>
      </blockquote>
		<?php
			session_start();
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "company";
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}	
			extract($_POST);
			/*if($review == null && $headline == null && $start1 == null) {
				//echo("Please enter the reivew");
			} else {*/
				// Create connection	
			$date = date("Y/m/d").date(' H:i:s', time());
			$user = $_SESSION['username'];
			$type = $Type;
			$product = $ProductName;
			$sql = "INSERT INTO review (pname,review,rate,user,date,type) VALUES('$product','$review','$rating','$user','$date', '$type')";
		
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully"."<br />";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$query = "SELECT * FROM review";
			$query .= " WHERE ";
			if ( !empty($ProductName)){
				$query .= "pname = '$ProductName' and ";
			}
			if ( !empty($Type)){
				$query .= "type = '$Type' and ";
			}
			$query = substr($query,0,-4);	
			$result = $conn->query($query);
			echo "<table border=\"1\">";
			echo "<th>ID</th>" . "<th>Product Name</th>" . "<th>Review</th>" . "<th>Rating</th>" . "<th>User</th>" . "<th>Date</th>" . "<th>Type</th>";
			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "<tr>";
					foreach($row as $key => $value) {
						echo "<td>$value</td>";
					}
					echo "</tr>";
			    }
			} else {
				echo "<tr>";
				echo "<td>0 results</td>";
				echo "</tr>";
			}
			echo "</table>";
			$conn->close();

		?>
    </div>
  </div>
</div>
<div id="footer"></div>
</body>
</html>