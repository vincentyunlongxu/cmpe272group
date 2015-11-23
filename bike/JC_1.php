<?php
  session_start();
  extract($_POST);
  
  $servername = "localhost";
  $username = "captajc5_group";
  $password = "CMPE272";
  $dbname = "captajc5_group";
  $content = "JC_1 viewed at time => ".date('Y-m-d').date(' H:i:s', time());
  $type = "Bike";
  echo $content;
  $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
  if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
  } 
  $pname = "JC_1";
  $query = "SELECT * FROM Product WHERE type = '$type' and pname = '$pname'";
  $sql = "INSERT INTO Track (type, pname, content) VALUES ('$type', '$pname', '$content')";
  
  $result = $conn->query($query);
  $data = $result->fetch_assoc();
  if(empty($_POST['review'])){
	  if ($conn->query($sql) === TRUE) {
		  echo "New user created successfully";
	  } else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
	  }
  }
  $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="../css/style.css">
<link type="text/css" rel="stylesheet" href="../css/example.css">
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>
<script type="text/javascript">
$(document).ready(function(){ 
  $(function(){ 
    $('.rate-btn').hover(function(){
        $('.rate-btn').removeClass('rate-btn-hover');
        var therate = $(this).attr('id');
        for (var i = therate; i >= 0; i--) {
            $('.rate-btn-'+i).addClass('rate-btn-hover');
        };
    });
                  
    $('.rate-btn').click(function(){    
        var therate = $(this).attr('id');
        $('#abc').val(therate);
        $('.rate-btn').removeClass('rate-btn-active');
        for (var i = therate; i >= 0; i--) {
            $('.rate-btn-'+i).addClass('rate-btn-active');
        };
    });
  });
});
</script>
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
  <!--facebook-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

  <div id="banner"></div>
  <div class="container">
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
          
                    <div class="col-md-6">
            <form id="frmreview" role="form" method="post" action="JC_1.php">
              <fieldset>
                    <legend>Please review and rate:</legend>
                <!-- <input type="radio" id="star5" name="rating" value="5" /><label for="star5" >5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" >4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" >3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" >2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" >1 star</label> -->
                <div class="rate-ex3-cnt">
                  <div id="1" class="rate-btn-1 rate-btn"></div>
                  <div id="2" class="rate-btn-2 rate-btn"></div>
                  <div id="3" class="rate-btn-3 rate-btn"></div>
                  <div id="4" class="rate-btn-4 rate-btn"></div>
                  <div id="5" class="rate-btn-5 rate-btn"></div>
                </div>
                <input id="abc" class="hidden" name="rating" value="5" />
                    <br />
                    <textarea name="review" rows="4" cols="50" placeholder="Write your review here"></textarea>
                    <br />
                    <input type="text" class="hidden" value="JC_1" name="ProductName" />
                    <input type="text" class="hidden" value="Bike" name="Type" />
                    <!-- <textarea name="headline" rows="1" cols="50" placeholder="Headline for your review"></textarea> -->
                    <p><font size="2" face="verdana" color="green">Posted publicly as <?php echo $_SESSION["username"];?></font></p>
                    <button name="btnAddReivew" type="submit" value="add">Submit</button> 
                </fieldset>
            </form>
            <!--facebook-->
            <div class="fb-like" data-href="http://www.captainlongxu.com/marketplace/bike/JC_1.php" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <!--facebook-->
          </div>
          <div class="col-md-6" overflow-y: auto;>
            <form id="frmreview" role="form">
              <fieldset>    
                <legend>Review</legend>       
                <?php
                  $servername = "localhost";
                  $username = "captajc5_group";
                  $password = "CMPE272";
                  $dbname = "captajc5_group";
                  
                  extract($_POST);
                  // Create connection
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  // Check connection
                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  if(!empty($_POST['review'])){
                    $date = date('Y-m-d').date(' H:i:s', time());
                    $sql = "INSERT INTO Review (type, pname, review, rate, date) VALUES ('$Type', '$ProductName', '$review', '$rating', '$date')";
                    $result = $conn->query($sql);
                  }
                  $query = "SELECT review, rate, date FROM Review WHERE pname = '$pname' ORDER BY date DESC";
                  $result = $conn->query($query);
                  
                  if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                      print("<p><font size = '6' color='orange'>");
                      while($row[1]) {
                        print("*");
                        $row[1]--;
                      }
                        print(" </font><font face='verdana' size = '2'> $row[0]</font>");
                      print("<br/><font size='1' face='verdana' color='green'>Reviewed on $row[2]</font></p>");
                    }
                  } else {
                    print("<p>There is no review</p>");
                  } 
                  $conn->close();
                ?>                   
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
