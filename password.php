<?php
  session_start();
  extract($_POST);
  if(!$USERNAME||!$PASSWORD){
    fieldsBlank();
    die();
  }else{
    $servername = "localhost";
 	$username = "captajc5_group";
  	$password = "CMPE272";
  	$dbname = "captajc5_group";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $query = "SELECT * FROM UserInfo";
    $query .= " WHERE username = '$USERNAME' and password = '$PASSWORD'";
	echo $query;
    $update = "UPDATE UserInfo SET status = 1  WHERE username = '$USERNAME' and password = '$PASSWORD'";
    $result = $conn->query($query);
    $userVerified = 0;
    if ($result->num_rows > 0) {
      $userVerified = 1;
      $conn->query($update);
      accessGranted($USERNAME, $path);
    } else {
      wrongPassword();
    }
  }
  function accessGranted($name, $path){
    $_SESSION["username"] = $name;
    if (strlen($path) < 12) {
      header("Location: http://www.captainlongxu.com/marketplace/".$path);
    } else {
      header("Location: http://".$path);
    }
  }
  function wrongPassword(){
    print("<div style = \"font-family: arial; font-size:1em; color:red\"><strong>Wrong username or password!<br />You enntered an invalid password.<br />Access has been dinied.</strong></div>");
  }
  function fieldsBlank(){
    print("<div style = \"font-family: arial; font-size:1em; color:red\"><strong>Login failed!<br />Please fill in all form fields.<br /></strong></div>");
  }
?>
<!DOCTYPE html>
<html>
<head>
<script src="file:///Macintosh HD/Users/yunlongxu/Downloads/js/jquery-2.1.1.js"></script> 
<script>
  $(document).ready(function(){ 
      $("head").load("header.html"); 
  }); 
  $(document).ready(function(){ 
      $("#banner").load("banner.php"); 
  }); 
  $(document).ready(function(){ 
      $("#left-nav").load("left-nav.html"); 
  }); 
  $(document).ready(function(){ 
      $("#footer").load("footer.html"); 
  });
</script>
<style>   
    p{
      text-indent: 2em; /*em是相对单位，2em即现在一个字大小的两倍*/
    }  
</style>
</head>
<body>
<div id="banner"></div>
<div class="container" style="height:700px;">
  <div class="row">
    <div class="col-md-3">
      <div id="left-nav"></div>
    </div>
    <div class="col-md-9">
      <h3>
        <blockquote><strong>Secure section</strong></blockquote>
      </h3>
        <div class="row">
          
        </div>
      </p>
    </div>
    </div>
  </div>
</div>
<div id="footer"></div>
</body>
</html>
<script type="text/javascript">
;jQuery(function($){
	set_nav_path(1, 0);
});
</script>