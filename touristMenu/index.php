<?php
		session_start();
		include_once('connectdb.php');
		
		if($_SESSION['email'] == "")
		{
			echo"<script type='text/javascript'>
	 	 	alert('Session end! Please login again!')
		    location.href='../../login/login.php'
		 	</script>";
			exit();
		}
		
			$query="SELECT * FROM login where email='".$_SESSION['email']."' ";
			$db=mysqli_query($con,$query) or die(mysqli_error($con));
			$result=mysqli_fetch_assoc($db);
			$username=$result['username'];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ITG</title>
  <link rel="icon" type="image/png" href="../images/logo.png"/>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel='stylesheet' type='text/css' />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- styles -->
  <link rel="stylesheet" href="assets/css/fancybox/jquery.fancybox.css">
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-theme.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/slippry.css">
  <link href="assets/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/color/default.css">
  <!-- =======================================================
    Theme Name: Groovin
    Theme URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <script src="assets/js/modernizr.custom.js"></script>
</head>

<body>
  <header>

    <div id="navigation" class="navbar navbar-inverse navbar-fixed-top default" role="navigation">
      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          	 <div class="logo" >
						<a href="index.php"><img src="../images/rsz_logoo.png" alt=""/></a>
					 </div>

        </div>

    
              <ul class="nav navbar-nav navbar-right">
               <li><a href="#">Hi, <?php echo $username ?> </a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="plan.php">Create Plan</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
          
          <!-- /.navbar-collapse -->
        </div>

      </div>
    </div>

  </header>
  <!-- section intro -->
  <section id="intro">
    <ul id="slippry-slider">
      <li>
        <a href="#slide1"><img src="assets/img/slide/kl.jpg" alt="Welcome to Intelligent Tourist Guide!"></a>
      </li>
      <li>
        <a href="#slide2"><img src="assets/img/slide/mosque.jpg"  alt="Travel Does The Heart Good"></a>
      </li>
      <li>
        <a href="#slide3"><img src="assets/img/slide/beach.jpg" alt="A new point of view"></a>
      </li>
    </ul>
  </section>
  <!-- end intro -->
  <!-- Section about -->
 <footer class= "footer">
        <div class="row">
          <div class="col-md-12">
            <div class="aligncenter">
             
                © 2018 Intelligent Tourist Guide
            
              
              
                <!--
                  All the links in the footer should remain intact. 
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Groovin
                -->
               
             
        </div>
      </div>
    </div>
  </footer>
  <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x"></i></a>
  <!-- javascript -->
  <script src="assets/js/jquery-1.9.1.min.js"></script>
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/classie.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/slippry.min.js"></script>
  <script src="assets/js/nagging-menu.js"></script>
  <script src="assets/js/jquery.nav.js"></script>
  <script src="assets/js/jquery.scrollTo.js"></script>
  <script src="assets/js/jquery.fancybox.pack.js"></script>
  <script src="assets/js/jquery.fancybox-media.js"></script>
  <script src="assets/js/masonry.pkgd.min.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/jquery.nicescroll.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <script src="assets/js/AnimOnScroll.js"></script>
  <script>
    new AnimOnScroll(document.getElementById('grid'), {
      minDuration: 0.4,
      maxDuration: 0.7,
      viewportFactor: 0.2
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#slippry-slider').slippry(
        defaults = {
          transition: 'vertical',
          useCSS: true,
          speed: 5000,
          pause: 3000,
          initSingle: false,
          auto: true,
          preload: 'visible',
          pager: false,
        }

      )
    });
  </script>

  <script src="assets/js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
