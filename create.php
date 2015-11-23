<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-2.1.1.js"></script> 
<script>
  $(document).ready(function(){ 
      $("head").load("header.html"); 
  }); 
  $(document).ready(function(){ 
      $("#banner").load("banner.html"); 
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
        <blockquote><strong>Create User</strong></blockquote>
      </h3>
      <div class="row">
      <p class="text-left" style="font-size:15px;">
        
        <?php
          $servername = "mysql";
          $username = "archerlml";
          $password = "081152016";
          $dbname = "company";
          extract($_POST);
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
           // Check connection
          if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
          } 

          $sql = "INSERT INTO user (firstname, lastname, email, address, homephone, cellphone)
           VALUES ('$inpfirstname', '$inplastname', '$inpemail', '$inpaddress', '$inphomephone', '$inpcellphone')";

          if ($conn->query($sql) === TRUE) {
              echo "New user created successfully";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();
        ?>
      </p>
    </div>
    </div>
  </div>
</div>
<div id="footer"></div>
</body>
</html>