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
        <blockquote><strong>Contact Us</strong></blockquote>
      </h3>
      <div class="row">
      <p class="text-left" style="font-size:15px;">
        
        <?php 
        $file = file_get_contents('contact.txt', null);
        $line = explode('*', $file);
        for($i=0; $i < count($line);$i++){
          $personInfo = explode(' ', $line[$i]);
          echo '
              <div class="col-md-4">
                <div class="thumbnail">
                  <img class = "this-img" src = "'.$personInfo[2].'" />
                  <div class="this-text">
                    <h3>Name : '.$personInfo[0].'</h3>
                    <h3>Titile : '.$personInfo[1].'</h3>
                    <h3>Phone : '.$personInfo[3].'</h3>
                  </div>
                  <p>
                    <a href="#" class="btn btn-primary" role="button">Contact</a>
                  </p>
                </div>
              </div>';
        }
        ?>
        </div>
      </p>
    </div>
    </div>
  </div>
</div>
<div id="footer"></div>
</body>
</html>