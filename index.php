<?php


    
    $page = (isset($_GET['pg']))?$_GET['pg']:'';



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
    <link rel="icon" href="../../favicon.ico">

    <title>Sistem e-BENCANA</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <style>

      body {
        padding-top: 50px;
        padding-bottom: 20px;
      }

      .jumbotron {
          position: relative;
          background: #000 url("img/imgbg1.jpg") center center;
          width: 100%;
          height: 100%;
          background-size: cover;
          overflow: hidden;
      }

      #map-container { 
          height: 500px;
          margin-top:0px;
          margin-left:auto;
          margin-right:auto;
      }


    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']."?pg=utama"; ?>">Portal eBENCANA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo $_SERVER['PHP_SELF']."?pg=utama"; ?>">Laman Utama</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF']."?pg=type"; ?>">Jenis Bantuan</a></li>
            <!--<li><a href="<?php //echo $_SERVER['PHP_SELF']."?pg=agihan"; ?>">Agihan Bantuan</a></li>-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agihan Bantuan<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?pg=agihan"; ?>">Permohonan Bantuan</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?pg=admin"; ?>">Log Masuk Pentadbir</a></li>
              </ul>
            </li>

            <li><a href="<?php echo $_SERVER['PHP_SELF']."?pg=contact"; ?>">Hubungi Kami</a></li>
          </ul>
          <?php
		  		
				if(isset($_SESSION['ISLOGIN'])){
		  
		  ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Log Keluar</a></li>
          </ul>
          <?php
		  
				}
		  
		  ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <div class="container">
    <?php


          	if($page == "agihan"){
            	include("pgagihan.php");
          	}else if($page == "utama"){
            	include("pghome.php");
			}else if($page == "admin"){
            	include("pgadmin.php");
			}else if($page == "type"){
            	include("pgjnsbantuan.php");
			}else if($page == "contact"){
            	include("pgcontact.php");
          	}else{
              	include("pghome.php");
          	}




    ?>
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>


          $(document).ready(function(e) {

              function init() {
                  var myLatlng = new google.maps.LatLng(3.129026,101.712810);
                  var myOptions = {
                      zoom: 10,
                      center: myLatlng,
                      mapTypeId: google.maps.MapTypeId.ROADMAP,
                  }
                  map = new google.maps.Map(document.getElementById('map-container'), myOptions);
              }


              google.maps.event.addDomListener(window, 'load', init);

          });

    </script>

  </body>
</html>
