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
			$id=$result['id'];
			
			
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
                        <h3 class="text-themecolor">Profile</h3>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                
                    <!-- Column -->
                   
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                               
                                 <form role="form" action="updateInfoAdmin.php?id=<?php echo $id; ?>" method="POST">
                            <div class="col-md-6">
                            
    <?php
		$query="SELECT fullname,email,password,phoneno,state from login where email='".$_SESSION['email']."'";
		$db=mysqli_query($con,$query);
		$result=mysqli_fetch_assoc($db);
	?>
                            
                            

                    
                                    <div class="col-md-12">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="textName" value="<?php echo $result['fullname'];?>"  class="form-control form-control-line" readonly>
                                        </div>
                                    </div>
                                    
                                    <br> 
                                    
                                   <div class="col-md-12">
                                        <label class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="text" name="textEmail" value="<?php echo $result['email'];?>"  class="form-control form-control-line" readonly>
                                        </div>
                                    </div>
                                    
                                    
                                    <br>
                                     
                                     <div class="col-md-12">
                                        <label class="col-sm-12">Phone No.</label>
                                       <div class="col-md-12">
                                            <input type="text" name="textPhoneno" value="<?php echo $result['phoneno'];?>"  class="form-control form-control-line" required>
                                       </div>
                                     </div>
                                     
                                     <br>
                                        
                    <div class="col-md-12">
                    <label class="col-md-12">State</label>
                    <div class="col-sm-12">
                    <select class="label-input100" input type="text"   name="textState" value="<?php echo $result['state'];?>"  readonly="readonly" required="required" oninput="myFunction()" /><option><?php echo $result['state'];?></option>
                      <option value="Johor">Johor</option>
                      <option value="Kedah">Kedah</option>
                      <option value="Kelantan">Kelantan</option>
                      <option value="Melaka">Melaka</option>
                      <option value="Negeri Sembilan">Negeri Sembilan</option>
                      <option value="Pahang">Pahang</option>
                      <option value="Perak">Perak</option>
                      <option value="Perlis">Perlis</option>
                      <option value="Pulau Pinang">Pulau Pinang</option>
                      <option value="Sabah">Sabah</option>
                      <option value="Sarawak">Sarawak</option>
                      <option value="Selangor">Selangor</option>
                      <option value="Terengganu">Terengganu</option>
                    </select>
                 </div>
                 </div>
                 
                 <br>
                                      <div class="form-group">
                                        <div class="col-md-12">
           <button type="submit" class="btn btn-success">Update Profile</button><a href="" data-toggle="modal" data-target="#myModal"><br><br> Change my password</a><br><br>
                                            </form>
                                            
                    <form name="passwordForm" action="changePassword.php" method="post" onSubmit="return validate()">
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog" style="width:50%;">
                        
                         <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                            <input type="hidden" name="textEmail" value="<?php echo $_SESSION['email'];?>"  class="form-control"  readonly required>
                            Current Password
							<input type="password" name="textPassword" value=""  class="form-control"  required>
							<br>
                            New Password
							<input name="textNewPassword" class="form-control"placeholder="		      			 *Atleast 8 characters long.*"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters!" required>
							<br>
                            Confirm Password
							<input name="textConfirmPassword" class="form-control"placeholder="	      				 *Atleast 8 characters long.*"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters!" required>
							<br>
                            <center><button type="submit" class="btn btn-success loginFormElement"><i class="fa fa-floppy-o"></i> Save</button></center>
                            </div>
                        
                                        </div>
                                    </div>
                
                                            
                            </div>
                        </div>
                    
                    <!-- Column -->
                </div>
                <!-- Row -->
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
    var x = document.getElementById("myInput");
    if (x.type == "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
                          }
    </script>
</body>

</html>