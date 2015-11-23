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
        <blockquote><strong>Search Results</strong></blockquote>
      </h3>
      <div class="row">
      <p class="text-left" style="font-size:15px;">
        <?php
          	$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "company"; 
            extract($_POST);
            // Create connection
            // $queryStr = "WHERE ";
            $query = "SELECT * FROM product ";
            if ($_SERVER['QUERY_STRING'] != "") {
              $type = $_SERVER['QUERY_STRING'];
            }
            // if(isset($btnSearch) && $btnSearch == "searchall"){}
            // else{
            //   if(isset($type) && $type != ""){
            //     $queryStr .= "type = '$type'";
            //   }
            // }
            // if($queryStr != ""){
            //   $query .= $queryStr;
            // }
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            } 
            $result = $conn->query($query);
           
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " type : " . $row["type"]. " content : " . $row["content"]."<br />";
              }
            } else {
              echo "0 results";
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