<div class="container">
<div class="row">
<div class="col-md-12" style="margin-top:15px"></div>
<div class="col-md-8">
<a href = "index.php"><img src="img/logo.png" alt="" style="float:left;"></a>
</div>
<div class="col-md-4"> <br/>
<span class="pull-right">Call Us：(408)123-4567、(408)765-4321</span> </div>
<div class="col-md-12" style="margin-top:5px"></div>
</div>
</div>
<div class="clearfix"/>
<nav class="navbar navbar-default" role="navigation">
<div class="container-fix" style="background-color:#1478c3;font-size:18px;"> 
<div class="container">
<div class="navbar-header">
<ul class="nav navbar-nav">
	<li id="nav0">
		<button class="btn btn-default" style="width:150px;border:0px; color:#ffffff;" onclick="javascript:window.open('/marketplace/index.php','_self')" type="button" aria-expanded="true">Home</button>
	</li>
	<li id="nav1">
		<button class="btn btn-default" style="width:150px;border:0px; color:#ffffff;" onclick="javascript:window.open('/marketplace/rating.php','_self')" type="button" aria-expanded="true">Rating</button>
	</li>
</ul>
</div>
<div class="navbar-right">
	<ul class="nav navbar-nav">
		<li id="nav99">
			<?php
			session_start();
			if (isset($_SESSION["username"])) {
				?>
				<button class="btn btn-default" style="width:150px;border:0px; color:#ffffff;" onclick="javascript:window.open('/marketplace/profile.php','_self')" type="button" aria-expanded="true"><?php echo $_SESSION["username"]; ?></button>
			<?php
			} else {
			?>
			<button class="btn btn-default" style="width:150px;border:0px; color:#ffffff;" onclick="javascript:window.open('/marketplace/login.php','_self')" type="button" aria-expanded="true">Login</button>
			<?php } ?>
		</li>
	</ul>
</div>
</div>
</div>
</nav>