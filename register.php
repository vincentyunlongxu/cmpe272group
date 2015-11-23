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
        <blockquote><strong>Register</strong></blockquote>
      </h3>
        <div class="row">
          <form action="login.php" method="post">
            <div class="form-group">
              <div class="row">
                <div class="col-md-3 text-right">
                  <label for="inpusername">Username</label>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="username" placeholder="your username"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3 text-right">
                  <label for="inppassword">Password</label>
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password" placeholder="your password"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3 text-right">
                  <label for="inppassword">Verify Password</label>
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="confirm" placeholder="your password"/>
                </div>
              </div>  
            </div>
            <div class="form-group text-right">
              <button id="btnLogin" name="register" type="submit" class="btn btn-primary">Submit</button>
            </div>
            <p><br/></p>  
        </form> 
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