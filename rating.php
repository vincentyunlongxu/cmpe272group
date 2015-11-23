<!DOCTYPE html>
<?php
  extract($_POST);
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
    width: 252px;
    height: 200px;
  }
  .this-text{
    height: 180px; 
    overflow: hidden;
    text-overflow:ellipsis;
  }
  </style>
</head>
<body>
  <div id="banner"></div>
  <div class="container" style="height:700px">
    <div class="row">
      <div class="col-md-6">
        <h3>
          <blockquote><strong>Best Review in 
            <?php 
              if (isset($bestReview)) {
                echo $bestReview;
              } else {
            ?>
              Marketplace
            <?php } ?>
          </strong></blockquote>
        </h3>
         <form id="frmBestReview" role="form" method="post" action="rating.php">
          <div class-"col-md-6">
            <select name="bestReview">
              <option value="marketplace" <?php if(isset($bestReview) && strcmp($bestReview, "marketplace") == 0){echo "selected";} ?> >marketplace</option>
              <option value="RealEstate" <?php if(isset($bestReview) && strcmp($bestReview, "RealEstate") == 0){echo "selected";} ?> >RealEstate</option>
              <option value="Bike" <?php if(isset($bestReview) && strcmp($bestReview, "Bike") == 0){echo "selected";} ?>>Bike</option>
              <option value="Book" <?php
               if(isset($bestReview)  && strcmp($bestReview, "Book") == 0){echo "selected";}?> >Book</option>
              <option value="Photo" <?php if(isset($bestReview) && strcmp($bestReview, "Photo") == 0){echo "selected";}?> >Photo</option>
              <option value="Pastry" <?php if(isset($bestReview) && strcmp($bestReview, "Pastry") == 0){echo "selected";}?> >Pastry</option>
              <option value="Vacrooms" <?php if(isset($bestReview) && strcmp($bestReview, "Vacrooms") == 0){echo "selected";}?> >Vacrooms</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="btnBestReview" type="submit" class="btn btn-primary">Rating</button>
          </div>
        </form>
        <?php
          error_reporting(E_ALL ^ E_DEPRECATED);
          $con = mysql_connect("localhost","captajc5_group","CMPE272");   //连接数据库  
          mysql_select_db("captajc5_group", $con);  //选择数据库   
          // Create connection
          $queryStr = " WHERE ";
          $query = "SELECT pname, AVG( rate ) , COUNT( review ) FROM Review" ;
          if (isset($bestReview)) {
            $queryStr .= "type = '$bestReview'"; //SQL语句 
          }
          $groupBy = " GROUP BY pname
                      ORDER BY AVG( rate ) DESC , COUNT( review ) DESC 
                      LIMIT 5";
          if (isset($bestReview) && strcmp($bestReview, "marketplace") != 0){
            $query .= $queryStr;
          } 
          $query .= $groupBy;
          if(!($result = mysql_query($query))) {
            print("could not execute query!");
            die(mysql_error());         
          }
          if (isset($bestReview)) {
            $di = $bestReview;
          } else {
            $di = "whole marketplace";
          }
            echo "<table border='1'>
            <br />
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
      </div>
      <div class="col-md-6">
        <h3>
          <blockquote><strong>Most Visited in 
            <?php 
              if (isset($mostVisited)) {
                echo $mostVisited;
              } else {
            ?>
              Marketplace
            <?php } ?>
            </strong></blockquote>
        </h3>
        <form id="frmMostVisited" role="form" method="post" action="rating.php">
          <div class-"col-md-6">
            <select name="mostVisited">
              <option value="marketplace" <?php if(isset($mostVisited) && strcmp($mostVisited, "marketplace") == 0){echo "selected";} ?> >marketplace</option>
              <option value="RealEstate" <?php if(isset($mostVisited) && strcmp($mostVisited, "RealEstate") == 0){echo "selected";} ?> >RealEstate</option>
              <option value="Bike" <?php if(isset($mostVisited) && strcmp($mostVisited, "Bike") == 0){echo "selected";} ?>>Bike</option>
              <option value="Book" <?php
               if(isset($mostVisited)  && strcmp($mostVisited, "Book") == 0){echo "selected";}?> >Book</option>
              <option value="Photo" <?php if(isset($mostVisited) && strcmp($mostVisited, "Photo") == 0){echo "selected";}?> >Photo</option>
              <option value="Pastry" <?php if(isset($mostVisited) && strcmp($mostVisited, "Pastry") == 0){echo "selected";}?> >Pastry</option>
              <option value="Vacrooms" <?php if(isset($mostVisited) && strcmp($mostVisited, "Vacrooms") == 0){echo "selected";}?> >Vacrooms</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="btnMostVisited" type="submit" class="btn btn-primary">Rating</button>
          </div>
        </form>
        <?php
          error_reporting(E_ALL ^ E_DEPRECATED);
          $con = mysql_connect("localhost","captajc5_group","CMPE272");   //连接数据库  
          mysql_select_db("captajc5_group", $con);  //选择数据库   
          // Create connection
          $queryStr = " WHERE ";
          $query = "SELECT pname , COUNT( pname ) FROM Track" ;
          if (isset($mostVisited)) {
            $queryStr .= "type = '$mostVisited'"; //SQL语句 
          }
          $groupBy = " GROUP BY pname
                      ORDER BY COUNT( pname ) DESC 
                      LIMIT 5";
          if (isset($mostVisited) && strcmp($mostVisited, "marketplace") != 0){
            $query .= $queryStr;
          } 
          $query .= $groupBy;
          if(!($result = mysql_query($query))) {
            print("could not execute query!");
            die(mysql_error());         
          }
          if (isset($bestReview)) {
            $di = $bestReview;
          } else {
            $di = "whole marketplace";
          }
            echo "<table border='1'>
            <br />
            <tr>
              <th>Product Name</th>
              <th>Number of Visitor</th>
            </tr>";
          
          while(@$row = mysql_fetch_row($result))
          {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";  
            echo "</tr>";
          }
          echo "</table>";

          mysql_close($con);
        ?>
      </div>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
<script type="text/javascript">
;jQuery(function($){
  set_nav_path(2, 0); 
});
</script>