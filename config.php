<?php 
//change the values with your own hosting setting
 $mysql_host = "localhost";
 $mysql_database = "company";
 $mysql_user = "root";
 $mysql_password = "";
 error_reporting(E_ALL ^ E_DEPRECATED);
 $db = mysql_connect($mysql_host,$mysql_user,$mysql_password);
 mysql_connect($mysql_host,$mysql_user,$mysql_password);
 mysql_select_db($mysql_database);
?>