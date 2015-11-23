<!DOCTYPE html>
<?php
      session_start();
      if (!isset($_SESSION["username"])) {
        header("Location: http://www.captainlongxu.com/marketplace/login.php?index.php");
      }
      echo "hello dear user =>" . $_SESSION["username"];
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
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active"> <img src="img/bg-11.jpg" alt=""> </div>
    <div class="item"> <img src="img/bookBanner.jpg" alt=""> </div>
    <div class="item"> <img src="img/bg-33.jpg" alt=""> </div>
  </div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!--br/-->
<hr/>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <a href="/marketplace/realestate.html"><div class="panel-body" onmouseover="this.style.cursor='pointer'"> <img src="img/35.png" alt="" style="height:48px;">&nbsp;<span>RealEstate</span></div></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <a href="/marketplace/bike.html"><div class="panel-body" onmouseover="this.style.cursor='pointer'"> <img src="img/45.png" alt="" style="height:48px;">&nbsp;<span>Bike</span> </div></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <a href="/marketplace/book.html"><div class="panel-body" onmouseover="this.style.cursor='pointer'"> <img src="img/10.png" alt="" style="height:48px;">&nbsp;<span>Book</span> </div></a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <a href="/marketplace/photo.html"><div class="panel-body" onmouseover="this.style.cursor='pointer'"> <img src="img/26.png" alt="" style="height:48px;">&nbsp;<span>Photo</span> </div></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <a href="/marketplace/pastry.html"><div class="panel-body" onmouseover="this.style.cursor='pointer'"> <img src="img/48.png" alt="" style="height:48px;">&nbsp;<span>Pastry</span> </div></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body" onmouseover="this.style.cursor='pointer'"> <a href="#"> <img src="img/49.png" alt="" style="height:48px;"></a>&nbsp;<span>Suyash</span> </div>
      </div>
  </div>
    </div>
  <div class="row">
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-size:24px;"><strong>Save, share and collaborate</strong></div>
            <div class="panel-body">
               <p>
                 <strong>LiveOnMars</strong> Easier sharing. <br />
                 <strong>LiveOnMars</strong> One-click sign-in. <br />
                 <strong>LiveOnMars</strong> View local activity. <br />
                 <strong>LiveOnMars</strong> Give you a best house. <br />
                 <strong>LiveOnMars</strong> Find a new place to live. <br />
                 <strong>LiveOnMars</strong> One and the only best choice. <br />
               </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-size:24px;"><strong>Let us guide you</strong></div>
            <div class="panel-body">
              <p><strong>Real estate</strong> is "property consisting of land and the buildings on it, along with its natural resources such as crops, minerals, or water; an interest vested in this (also) an item of real property; buildings or housing in general. Also: the business of real estate; the profession of buying, selling, buildings or housing." </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body" style="background-image:url('img/bg-tools.jpg');background-repeat:no-repeat;overflow:hidden;" onclick=""> &nbsp; </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body" style="background-image:url('img/bg-tools.jpg');background-position:0px -60px;background-repeat:no-repeat;overflow:hidden;"> &nbsp; </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body" style="background-image:url('img/bg-tools.jpg');background-position:0px -120px;background-repeat:no-repeat;overflow:hidden;" onclick=""> &nbsp; </div>
      </div>
    </div>
  </div>
</div>
<div id="footer"></div>
</body>
</html>