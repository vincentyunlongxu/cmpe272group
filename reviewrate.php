<?php
	//error_reporting(E_ALL ^ E_DEPRECATED);
	
	$type = $_POST["type"];
	$con = mysql_connect("localhost","mingxiao_admin","admin");   //连接数据库  
    mysql_select_db("mingxiao_bike", $con);  //选择数据库  
                
   	$sql = "SELECT pname, AVG( rate ) , COUNT( review ) 
			FROM review
			WHERE TYPE = '$type'
			GROUP BY pname
			ORDER BY AVG( rate ) DESC , COUNT( review ) DESC 
			LIMIT 5"; //SQL语句  
	if(!($result = mysql_query($sql))) {
		print("could not execute query!");
		die(mysql_error());					
	}
	echo "<table border='1'>
	<tr>
		<td>
			Best Review Product in $type
		</td>
	</tr>
	<tr>
		<th>Product Name</th>
		<th>Average Rating</th>
		<th>Number of Reviews</th>
	</tr>";
	
	while(@$row = mysql_fetch_row($result))
	{
		echo "<tr>";
		echo "<td>" . $row[0] . "</td>";
		echo "<td>" . $row[1] . "</td>";
		echo "<td>" . $row[2] . "</td>";		
		echo "</tr>";
	}
	echo "</table>";

	mysql_close($con);
?>

