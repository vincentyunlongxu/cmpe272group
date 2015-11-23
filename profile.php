<!DOCTYPE html>
<?php
  session_start();

  $username = $_SESSION['username'];

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
        <h3>User Profile</h3>
      </blockquote>
      <form id="frmLogin" role="form" method="post" action="logout.php">
        Dear User <?php echo $_SESSION['username']; ?>
        <div class="form-group text-right">
          <input type="text" class="hidden" value="<?php echo $_SESSION['username'];?>" name="USERNAME" />
          <button id="btnLogout" type="submit" class="btn btn-primary">Logout</button>
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