﻿<?php
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
			
					//$query = mysql_query("SELECT * FROM shows_and_events");
$query = mysqli_query($con, "SELECT * FROM login where role='user'");

/* pagination process */
  
$limit =10;  
if (isset($_GET["page"]))
 { $page  = $_GET["page"]; } 
 else
 { $page=1; };  
 
$start_from = ($page-1) * $limit;  
  
 
 
  
$sql = "SELECT id, fullname, email, state FROM login where role='user' ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query ($con,$sql);	


			
			
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
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">
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
                        <!-- Logo icon --><b>
                            <img src="../assets/images/rsz_logoo.png" alt="homepage" width="142" height="78" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                       
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
                        <li> <a class="waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Place</span><span class="fa fa-angle-right" style="float: right"></span></a>
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
                        <h3 class="text-themecolor">View User</h3>
                    </div>
                    
                </div>
                
                <div class="container">
               <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for area.." title="Type in an area">



</div>

<br>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                
                                   
                                <table id="userTable" class=" table-striped table-bordered " cellspacing="1" width="100%">
              <thead>
                <tr>
                  <th >ID</th>
                  <th >Full Name</th>
                  <th >Email</th>
                  <th >State</th>
                  
                </tr>
              </thead>
              
              <!-- php -->
             
             <tbody>
             
              <?php
			   		while($row=mysqli_fetch_array($rs_result))
					{ 
			   ?>
              	<tr>
                	<td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['state']; ?></td>
                   
                    
                </tr>
                <?php } ?> 
       
      </tbody>
      </table>
      </div>
            
        
         <?php
		/* Pagination process */
echo '<div class="center"> ';

 

$pagLink = "<div class='paginations'>";
$sql = "SELECT COUNT(id) FROM login where role='user' ";  
$rs_result = mysqli_query($con,$sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  


for ($i=1; $i<=$total_pages; $i++) {
	
	if($page == $i)
	{ 
	 $pagLink .= "<a href='viewUser.php?page=".$i."' class='active'>".$i."</a>";
	}  
	else
	{
	 $pagLink .= "<a href='viewUser.php?page=".$i."'>".$i."</a>";
	}
               
}; 
 
echo $pagLink . "</div>"; 
	
	
			
			?>
                                <div class="table-responsive">
                                    
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2018 Intelligent Tourist Guide
            </footer>
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
    <!-- Bootstrap tether Core JavaScript -->
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
    <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("userTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>

</html>