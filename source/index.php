<?php

error_reporting(0);

$pg = (isset($_GET['pg']))?$_GET['pg']:'';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- <link rel="icon" href="../../favicon.ico">-->

    <title>Prototype Hackathon - DengueSpot</title>

    <!-- Bootstrap core CSS -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI Pro -->
    <link href="css/flat-ui-pro.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="css/justified-nav.css" rel="stylesheet">-->
    <style type="text/css">
    /*
			
			body{
				background: #8999A8;
				background:#E26A6A;
			}
			
			.navbar, .dropdown-menu{
			background:rgba(255,255,255,0.25);
			border: none;
			
			}
			
			.nav>li>a, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover, .dropdown-menu>li>a, .dropdown-menu>li{
			  border-bottom: 3px solid transparent;
			}
			.nav>li>a:focus, .nav>li>a:hover,.nav .open>a, .nav .open>a:focus, .nav .open>a:hover, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{
			  border-bottom: 3px solid transparent;
			  background: none;
			}
			.navbar a, .dropdown-menu>li>a, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{
			 color: #fff;
			}
			.dropdown-menu{
				  -webkit-box-shadow: none;
				box-shadow:none;
			}
			
			.nav li:hover:nth-child(8n+1), .nav li.active:nth-child(8n+1){
			  border-bottom: #C4E17F 3px solid;
			}
			.nav li:hover:nth-child(8n+2), .nav li.active:nth-child(8n+2){
			  border-bottom: #F7FDCA 3px solid;
			}
			.nav li:hover:nth-child(8n+3), .nav li.active:nth-child(8n+3){
			  border-bottom: #FECF71 3px solid;
			}
			.nav li:hover:nth-child(8n+4), .nav li.active:nth-child(8n+4){
			  border-bottom: #F0776C 3px solid;
			}
			.nav li:hover:nth-child(8n+5), .nav li.active:nth-child(8n+5){
			  border-bottom: #DB9DBE 3px solid;
			}
			.nav li:hover:nth-child(8n+6), .nav li.active:nth-child(8n+6){
			  border-bottom: #C49CDE 3px solid;
			}
			.nav li:hover:nth-child(8n+7), .nav li.active:nth-child(8n+7){
			  border-bottom: #669AE1 3px solid;
			}
			.nav li:hover:nth-child(8n+8), .nav li.active:nth-child(8n+8){
			  border-bottom: #62C2E4 3px solid;
			}
	
	*/
	</style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


<div class="navbar-wrapper">
            <div class="container-fluid">

               <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                    <span class="sr-only">Toggle navigation</span>
                  </button>
                  <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="83" height="73"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-01">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Utama</a></li>
                    <li><a href="index.php?pg=about">Latar Belakang</a></li>
                    <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
						<ul class="dropdown-menu">
                        	<li><a href="index.php?pg=hotspot">Senarai HotSpot Denggi</a></li>
                        	<li><a href="index.php?pg=aduan">Senarai Aduan</a></li>
                        	<li><a href="index.php?pg=lapor">Carta</a></li>
                        	<li><a href="index.php?pg=anali">Analisa</a></li>
                       	</ul>
                    </li>
                    <li><a href="admin">Admin</a></li>
                   <!-- <li><a href="#fakelink">Denggi</a></li>
                    <li><a href="#fakelink">About</a></li>-->
                   </ul>
                  <form class="navbar-form navbar-right" action="#" role="search">
                    <div class="form-group">
                      <div class="input-group">
                        <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
                        <span class="input-group-btn">
                          <button type="submit" class="btn"><span class="fui-search"></span></button>
                        </span>
                      </div>
                    </div>
                  </form>
                </div><!-- /.navbar-collapse -->
              </nav><!-- /navbar -->

            </div>
</div>

    <div class="container">
      <!-- page holder here -->
      
      <?php
	  
	  		
			if($pg == "home"){
				include("home.php");
			}elseif($pg == "lists"){
				include("lists.php");
			}elseif($pg == "lapor"){
				include("main1.php");
			}elseif($pg == "hotspot"){
				include("senaraihotspot.php");
			}elseif($pg == "aduan"){
				include("senaraikesaduan.php");
			}elseif($pg == "anali"){
				include("analitik.php");
			}elseif($pg == "about"){
				include("about.php");			
			}else{
	  			include("home.php");
			}
	  
	  
	  ?>
	  
      <!-- Example row of columns -->
      <!--
      <div class="row">
        <div class="col-lg-4">
          <h3>Safari bug warning!</h3>
          <p class="text-danger">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
-->
      <!-- Site footer -->
      
      <!--<footer class="footer">
        <p>&copy; seventyonelabsolution enterprise <strong>(A-123456)</strong> 2015</p>
        <p> &copy; Seventyonelabsolution Enterprise <strong>&nbsp;(002346863-U)</strong> - 2015</p>
      </footer>-->

    </div> <!-- /container -->
    <div class="navbar navbar-default navbar-fixed-bottom">
    	<div class="container">
          <p class="navbar-text pull-left">© 2015 - Hackathon Prototype
               <a href="http://www.dbkl.gov.my" target="_blank" >The Coredess</a>
          </p>
          
          <a href="http://youtu.be/zJahlKPCL9g" class="navbar-btn btn-success btn pull-right">
          <span class="glyphicon glyphicon-star"></span> Vote for us</a>
        </div>
        
        
    </div>
    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="js/vendor/jquery.min.js"></script>
    <!--<script src="../dist/js/vendor/video.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script type="text/javascript" src="js/pager.js"></script>
    <script src="js/flat-ui-pro.js"></script>
    <script type="text/javascript">
	
			$(document).ready(function(){
				
				
				
				//$('.nav>li').removeClass('active');

			});
	
	</script>
  </body>
</html>

