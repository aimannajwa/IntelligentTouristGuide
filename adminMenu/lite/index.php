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
		
			$query="SELECT * FROM login where email='".$_SESSION['email']."'";
			$db=mysqli_query($con,$query) or die(mysqli_error($con));
			$result=mysqli_fetch_assoc($db);
			
			
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.png">
    <title>ITG</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
   
    
    <style>
       #mapp {
        height: 400px;
        width: 100%;
       }
	   
	   #registered{
		   alignment-adjust:central;
	   }
    </style>
    
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/ilmudetil.css">
    <script src='assets/js/jquery-1.10.1.min.js'></script>       
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu-5WwFxkTfzTGV7Ai2HLS5ehpzl0IcyM&callback=initMap">
    </script>
    
     <script>
        
    var marker;
      function initialize() {
        var infoWindow = new google.maps.InfoWindow;
        
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
 
        var map = new google.maps.Map(document.getElementById('mapp'), mapOptions);
        var bounds = new google.maps.LatLngBounds();

        // Retrieve data from database
         <?php
           
			$query =" SELECT count(state) as NUMBER from login where state='Melaka' ";
			$result=mysqli_query($con,$query);
			
			$lat="2.1944";
			$lng="102.2491";
			
			$type=array();
			$x=0;
			
			while ($data = mysqli_fetch_assoc($result))
            {
				  
				$type[]=$data['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Melaka, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			$query2 =" SELECT count(state) as NUMBER from login where state='Perak' ";
			$result2=mysqli_query($con,$query2);
			
			$lat="4.5921";
			$lng="101.0901";
			
			$type=array();
			$x=0;
			
			while ($data2 = mysqli_fetch_assoc($result2))
            {
				  
				$type[]=$data2['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Perak, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			$query3 =" SELECT count(state) as NUMBER from login where state='Johor' ";
			$result3=mysqli_query($con,$query3);
			
			$lat="1.4854";
			$lng="103.7618";
			
			$type=array();
			$x=0;
			
			while ($data3 = mysqli_fetch_assoc($result3))
            {
				  
				$type[]=$data3['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Johor, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			$query4 =" SELECT count(state) as NUMBER from login where state='Kedah' ";
			$result4=mysqli_query($con,$query4);
			
			$lat="6.1184";
			$lng="100.3685";
			
			$type=array();
			$x=0;
			
			while ($data4 = mysqli_fetch_assoc($result4))
            {
				  
				$type[]=$data4['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Kedah, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			$query5 =" SELECT count(state) as NUMBER from login where state='Kelantan' ";
			$result5=mysqli_query($con,$query5);
			
			$lat="6.1254";
			$lng="102.2381";
			
			$type=array();
			$x=0;
			
			while ($data5 = mysqli_fetch_assoc($result5))
            {
				  
				$type[]=$data5['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Kelantan, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			$query6 =" SELECT count(state) as NUMBER from login where state='Negeri Sembilan' ";
			$result6=mysqli_query($con,$query6);
			
			$lat="2.7258";
			$lng="101.9424";
			
			$type=array();
			$x=0;
			
			while ($data6 = mysqli_fetch_assoc($result6))
            {
				  
				$type[]=$data6['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Negeri Sembilan, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			$query7 =" SELECT count(state) as NUMBER from login where state='Pahang' ";
			$result7=mysqli_query($con,$query7);
			
			$lat="3.8126";
			$lng="103.3256";
			
			$type=array();
			$x=0;
			
			while ($data7 = mysqli_fetch_assoc($result7))
            {
				  
				$type[]=$data7['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Pahang, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			$query8 =" SELECT count(state) as NUMBER from login where state='Perlis' ";
			$result8=mysqli_query($con,$query8);
			
			$lat="6.4449";
			$lng="100.2048";
			
			$type=array();
			$x=0;
			
			while ($data8 = mysqli_fetch_assoc($result8))
            {
				  
				$type[]=$data8['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Perlis, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			
			$query9 =" SELECT count(state) as NUMBER from login where state='Pulau Pinang' ";
			$result9=mysqli_query($con,$query9);
			
			$lat="5.4163";
			$lng="100.3328";
			
			$type=array();
			$x=0;
			
			while ($data9 = mysqli_fetch_assoc($result9))
            {
				  
				$type[]=$data9['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Pulau Pinang, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			$query10 =" SELECT count(state) as NUMBER from login where state='Sabah' ";
			$result10=mysqli_query($con,$query10);
			
			$lat="5.9788";
			$lng="116.0753";
			
			$type=array();
			$x=0;
			
			while ($data10 = mysqli_fetch_assoc($result10))
            {
				  
				$type[]=$data10['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Sabah, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			$query11 =" SELECT count(state) as NUMBER from login where state='Sarawak' ";
			$result11=mysqli_query($con,$query11);
			
			$lat="1.5533";
			$lng="110.3592";
			
			$type=array();
			$x=0;
			
			while ($data11 = mysqli_fetch_assoc($result11))
            {
				  
				$type[]=$data11['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Sarawak, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			$query12 =" SELECT count(state) as NUMBER from login where state='Selangor' ";
			$result12=mysqli_query($con,$query12);
			
			$lat="3.0738";
			$lng="101.5183";
			
			$type=array();
			$x=0;
			
			while ($data12 = mysqli_fetch_assoc($result12))
            {
				  
				$type[]=$data12['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Selangor, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			$query13 =" SELECT count(state) as NUMBER from login where state='Terengganu' ";
			$result13=mysqli_query($con,$query13);
			
			$lat="5.3117";
			$lng="103.1324";
			
			$type=array();
			$x=0;
			
			while ($data13 = mysqli_fetch_assoc($result13))
            {
				  
				$type[]=$data13['NUMBER'];
				
				echo ("addMarker($lat, $lng, '<b>Terengganu, $type[$x]</b>');\n");                        
           $x++;
			}
			
			
			
			
			
			
			
              
                
                
          ?>
          
          
        // Proses of making marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Displays information on markers that are clicked
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body onload="initialize()" class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Intelligent Tourist Guide</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo text -->
                        <span>
                            <img src="../assets/images/rsz_logoo.png" alt="homepage" width="142" height="78" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                       
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                        <a href="logout.php" class="mdi mdi-logout">
          <span class="glyphicon glyphicon-log-out"></span> Log out</a>
        
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-profile.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a></li>
                        <li> <a class="waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-table"></i><span class= "hide-menu">Place</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul>
		            <li><a href="addLocation.php">Add</a></li>
                    <li><a href="updateDelete.php">Update/Delete</a></li>	
		               </ul>
                       </li>
                         <li> <a class="waves-effect waves-dark" href="viewUser.php" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Users Information</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="map.php" aria-expanded="false"><i class="mdi mdi-earth"></i><span class="hide-menu">Map</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="feedback.php" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Feedback</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="statistic.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Statistic</span></a></li>
                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                    </div>
                    
                </div>
               
                <!-- ============================================================== -->
            
            
        
            
       <?php
			
		/*	$findCounts = mysqli_query("Select * from user_count");
			
			while ($row = mysqli_fetch_assoc($findCounts))
			{
				$currentCounts = $row['counts'];
				$newCounts = $currentCounts + 1;
				$updateCounts = mysqli_query("UPDATE 'intelligentouristguide' . 'user_count' SET 'counts' = $newCounts");
				
				
			} */
			
			$sqlUser="SELECT count(email) as count FROM login where role='user'";
			$queryUser=mysqli_query($con,$sqlUser);
			$resultUser=mysqli_fetch_assoc($queryUser);
			
			
			
			
		 ?>
         
         
 <div class="row" id="registered">
<a href="viewUser.php">

  <div class=" col-md-12">
      <div class="card">
      <center>
          <div class="card-body">
                  <div>
                    
                         <h2>
                           <strong><?php echo $resultUser['count'] ?></strong>
                         </h2>
                         <h4>
                            Registered Users
                         </h4>
                  
                    <br>
                </div>
          </div>
          </center>
     </div>
     
</div>


</a>
 </div>
 
                  
                                    
       
      


 
  
    <div id="mapp"></div>
    

 
        
       
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2018 Intelligent Tourist Guide </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard.js"></script>
    
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