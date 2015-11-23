<?php
  session_start();
  $servername = "localhost";
  $username = "captajc5_group";
  $password = "CMPE272";
  $dbname = "captajc5_group";
  $content = "Desert Island viewed at time => ".date('Y-m-d').date(' H:i:s', time());
  $type = "Vacrooms";
  echo $content;
  $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
  if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
  } 
  $pname = "Desert Island";
  $query = "SELECT * FROM Product WHERE type = '$type' and pname = '$pname'";
  $sql = "INSERT INTO Track (type, pname, content) VALUES ('$type', '$pname', '$content')";
  
  $result = $conn->query($query);
  $data = $result->fetch_assoc();

  if ($conn->query($sql) === TRUE) {
      echo "New user created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<script src="../js/jquery-2.1.1.js"></script> 
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
  <style type="text/css">
  .this-img {
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    width: auto;
    height: 260px;
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
          <blockquote><strong>Products</strong></blockquote>
        </h3>
        <div class="row">
          <div class="col-md-6">
            <div class="thumbnail">
              <img src="../img/<?php echo $data['image']; ?>"></img>
            </div>
          </div>
          <div class="col-md-6">
              <div class="list-group">
              <div class="list-group-item active">
                <h5 class="list-group-item-heading"><b>Name</b></h5>
                <p class="list-group-item-text"><?php echo $data["pname"]; ?></p>
              </div>
              <div class="list-group-item">
                <h5 class="list-group-item-heading"><b>Description</b></h5>
                <p class="list-group-item-text"><?php echo $data["content"]; ?></p>
              </div>
              <div class="list-group-item">
                <h5 class="list-group-item-heading"><b>Buy Now!</b></h5>
                <p class="list-group-item-text">
                <form id="frmorder" class="form-horizontal" role="form">
                <div class="form-group">
                <div class="col-md-12 text-right">
                    <a href="#" type="button" class="btn btn-primary">Buy Now!</a>
                </div>
                </div>
                </form>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <form id="frmreview" role="form" method="post" action="../review.php">
              <fieldset>
                    <legend>Please review and rate:</legend>
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" >5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" >4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" >3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" >2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" >1 star</label>
                    <br />
                    <textarea name="review" rows="4" cols="50" placeholder="Write your review here"></textarea>
                    <br />
                    <input type="text" class="hidden" value="apartment" name="ProductName" />
                    <input type="text" class="hidden" value="RealEstate" name="Type" />
                    <!-- <textarea name="headline" rows="1" cols="50" placeholder="Headline for your review"></textarea> -->
                    <p><font size="2" face="verdana" color="green">Posted publicly as <?php echo $_SESSION["username"];?></font></p>
                    <button name="btnAddReivew" type="submit">Submit</button>
                </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
