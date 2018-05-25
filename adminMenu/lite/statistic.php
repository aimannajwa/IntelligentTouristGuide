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
			$id=$result['id'];
			
			
			 $sql1 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Johor' ";
          $result1=mysqli_query($con,$sql1) ;
         $data1 = mysqli_num_rows($result1);
		
		
		  
		  $sql2 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Kedah' ";
          $result2=mysqli_query($con,$sql2);
        $data2 = mysqli_num_rows($result2);
		
		  
		  $sql3 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Kelantan' ";
         $result3=mysqli_query($con,$sql3);
        $data3 = mysqli_num_rows($result3);
		
		  
		  $sql4 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Melaka' ";
         $result4=mysqli_query($con,$sql4);
         $data4 = mysqli_num_rows($result4);
		
		  
		  $sql5 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Negeri Sembilan' ";
          $result5=mysqli_query($con,$sql5);
        $data5 = mysqli_num_rows($result5);
		
		  
		  $sql6 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Pahang' ";
          $result6=mysqli_query($con,$sql6);
         $data6 = mysqli_num_rows($result6);
		
		  
		  $sql7 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Perak' ";
         $result7=mysqli_query($con,$sql7);
         $data7 = mysqli_num_rows($result7);
		
		  
		  $sql8 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Perlis' ";
         $result8=mysqli_query($con,$sql8);
          $data8 = mysqli_num_rows($result8);
		
		  
		  $sql9 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Pulau Pinang' ";
         $result9=mysqli_query($con,$sql9);
         $data9 = mysqli_num_rows($result9);
		
		  
		  $sql10 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Sabah' ";
         $result10=mysqli_query($con,$sql10);
         $data10 = mysqli_num_rows($result10);
		
		  
		  $sql11 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Sarawak' ";
          $result11=mysqli_query($con,$sql11);
         $data11 = mysqli_num_rows($result11);
		
		  
		  $sql12 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Selangor' ";
         $result12=mysqli_query($con,$sql12);
        $data12 = mysqli_num_rows($result12);
		
		  
		  $sql13 = "SELECT place.area from plan join place on plan.placeId1=place.placeId or plan.placeId2=place.placeId or plan.placeId3=place.placeId where place.area = 'Terengganu' ";
          $result13=mysqli_query($con,$sql13);
            $data13 = mysqli_num_rows($result13);
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
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["State", "Tourist", { role: "style" } ],
        ["Johor", <?php echo $data1; ?> , "#b87333"],
        ["Kedah", <?php echo $data2; ?> , "#FF3366"],
        ["Kelantan", <?php echo $data3; ?> , "gold"],
        ["Melaka", <?php echo $data4; ?> , "color: #e5e4e2"],
		 ["Negeri Sembilan", <?php echo $data5; ?> , "color: #000099"],
		  ["Pahang", <?php echo $data6; ?> , "color: #66FF66"],
		   ["Perak", <?php echo $data7; ?> , "color: #CC0033"],
		    ["Perlis", <?php echo $data8; ?> , "color: #990099"],
			 ["Pulau Pinang", <?php echo $data9; ?> , "color: #3399FF"],
			  ["Sabah", <?php echo $data10; ?> , "color: #00FF66"],
			   ["Sarawak", <?php echo $data11; ?> , "color: #66FF33"],
			    ["Selangor", <?php echo $data12; ?> , "color: #330033"],
				 ["Terengganu", <?php echo $data13; ?> , "color: #9966FF"]
				
			
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Graph of state against no. of plan",
        width: 1059,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
    
   
    
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
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
                        <h3 class="text-themecolor">Statistic</h3>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales overview chart -->
                <!-- ============================================================== -->
               
                              <div id="columnchart_values" style="width:1059px; height: 400px;"></div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
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
    
   
</body>

</html>