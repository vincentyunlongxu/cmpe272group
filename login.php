<!DOCTYPE html>
<?php
  error_reporting(E_ALL ^ E_DEPRECATED);

  $con = mysql_connect("localhost", "captajc5_group", "CMPE272");
  mysql_select_db("captajc5_group", $con);  
	
  if (isset($_POST['register'])) {
    $username = $_POST["username"];
  	$psw = $_POST["password"];  
    $psw_confirm = $_POST["confirm"];  
  	if($username == "" || $psw == "") {  
        echo "<script>alert('Please make sure all information is correct!'); history.go(-1);</script>";  
    }
  	if($psw != $psw_confirm) {
  		echo "<script>alert('Please enter the same password!'); history.go(-1);</script>";  
  	}
  	$sql = "select * from UserInfo where username = '$username'"; //SQL语句  
  	if(!($result = mysql_query($sql))) {
  		print("could not execute query!");
  		die(mysql_error());					
  	}

  	$num = mysql_num_rows($result);
  	if($num)
  	{  
  		echo "<script>alert('user already exists!'); history.go(-1);</script>";
  	} 
  	else {
  		$sql_insert = "insert into UserInfo (username,password) values('$username','$psw')";  
  		$res_insert = mysql_query($sql_insert);  
  		if($res_insert) {  
  			echo "<script>alert('Registered! Please login'); history.go(1);</script>";  
  		} 
  		else {
  			echo "<script>alert('Cannot register! Please try again'); history.go(-1);</script>";  
  		}
  	}
  }

	$path = $_SERVER['QUERY_STRING'];
	echo $path;
?>
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
    <div class="col-md-6 col-md-offset-1" style="background-image:url('img/top_view.jpg');overflow:hidden;background-repeat:no-repeat;height:300px;">&nbsp;</div>
    <div class="col-md-3">
      <blockquote>
        <h3>Administrator Login</h3>
      </blockquote>
      <form id="frmLogin" role="form" method="post" action="password.php">
        <div class="form-group">
          <label for="inpusername">Username</label>
          <input type="text" class="form-control" name="USERNAME" placeholder="your username"/>
        </div>
        <div class="form-group">
          <label for="inppassword">Password</label>
          <input type="password" class="form-control" name="PASSWORD" placeholder="your password"/>
        </div>
        <div class="hidden">
          <input type="text" class="hidden" name="path" value="<?php echo $path;?>"/>
        </div>
        <div class="form-group text-right">
          <a href="/marketplace/register.php">register now!</a>&nbsp;&nbsp;&nbsp;<button id="btnLogin" type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="footer"></div>
</body>
</html>
<script type="text/javascript">
;jQuery(function($){
	set_nav_path(99,0);
});
</script>