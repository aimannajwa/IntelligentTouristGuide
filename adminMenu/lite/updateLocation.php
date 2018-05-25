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
			
			
		$placeId=$_GET['placeId'];
		$query="SELECT * from place where placeId = $placeId";
		$db=mysqli_query($con,$query);
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
                        <h3 class="text-themecolor">Update Location</h3>
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
                   
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-16">
                                
<form action="upload.php?placeId=<?php echo $placeId; ?>" method="post" enctype="multipart/form-data">
  Image: 
  <br>
  <input type="file" name="fileToUpload" id="fileToUpload" value="<img src=img/<?php echo $result['image']?> >">
  
  
  <div class="btnn">
  <button type="submit" class="btn submit" name="update">Update</button>
  <a href="updateDelete.php"><button type="button" class="btn cancel" name="cancel">Cancel</button></a>
  <br><br>
  </div>
</form>
                               
                               <br><br>

<form role="form" id="location" action="update.php?placeId=<?php echo $placeId; ?>" method="POST">
                
<div class="form-group">
<label class="loginFormElement">Location Name</label>
<input type="text" id="locName" name="locName" class="form-control" value="<?php echo $result['locName'];?>"  class="form-control form-control-line" required>
</div>

<br> 

  <div class="form-group" >
               <label for="latitude" class="loginFormElement">Latitude:</label>
                    <input class="form-control" id="lat" name="latitude" value="<?php echo $result['latitude'];?>" type="text"  style="width: 100%;" readonly>
               </div>
               
               <br> 
               
               <div class="form-group" >
               <label for="longitude" class="loginFormElement">Longitude:</label>
                <input class="form-control" id="long" name="longitude" value="<?php echo $result['longitude'];?>" type="text"  style="width: 100%;" readonly>
               </div>
               
               <br>

<div class="form-group">
<label class="loginFormElement">Address</label>
<input type="text" name="address"  value="<?php echo $result['address'];?>"  class="form-control form-control-line"  required>
</div>
                                    
                                    
                                    
<br>
                                    
<div class="form=group">
<label class="loginFormElement">Area: </label>
<br>

<select class="label-input100" input type="text"   name="area" value="<?php echo $result['area'];?>" required="required" oninput="myFunction()" /><option><?php echo $result['area'];?></option>
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
                 
                 
<br>
                             
<div class="form-group">
<label class="loginFormElement">Tag: </label>
<br>
<select class="label-input100" input type="text"   name="tag" value="<?php echo $result['tag'];?>"  readonly="readonly" required="required" oninput="myFunction()" /><option><?php echo $result['tag'];?></option>
<option value="Beach">Beach</option>
<option value="Mall">Mall</option>
<option value="Museum">Museum</option>
<option value="Water Theme Park">Water Theme Park</option>
<option value="Zoo">Zoo</option>
</select>
</div>
                 
<br>
                 
<div class="form-group">
<label class="loginFormElement">Description</label>
<input type="text" name="description" class="form-control" value="<?php echo $result['description'];?>"   required>
</div>                   
                                     
<br>
                                     
<div class="form-group">
<label  class="loginFormElement">Fees (RM):</label></br>
<style>input[type=number]::-webkit-inner-spin-button {opacity: 1} </style>
<input type="number" name="fees"  value="<?php echo $result['fees'];?>" min="0" max="10000">
</div>
               
<br>
               		
<div class="btn">
<button type="submit" class="btn submit" name="submit">Update</button>
<a href="updateDelete.php"><button type="button" class="btn cancel" name="cancel">Cancel</button></a>
<br><br>
</div>

</form>
              
               
               
             
               
           
              
               
               
                
               
			
            
            
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
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/20625/jquery.geocomplete.min.js'></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAu-5WwFxkTfzTGV7Ai2HLS5ehpzl0IcyM&libraries=places'></script>
    <script>
      $(document).ready(function(){
    // Call Geo Complete
    $("#locName").geocomplete({details:"form#location"});
  });
    </script> <!-- function ni yang autofill laltitude dgn longitude based on address -->
   <script src="https://maps.googleapis.com/maps/js?v=3.exp&signed_in=true&libraries=places"></script>
   <script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', intilize);
    function intilize(){
	var input = document.getElementById('locName');
	var options = {}
    var autocomplete = new google.maps.places.Autocomplete(input, options);

     google.maps.event.addListener(autocomplete, 'place_changed', function() {

	  var place = autocomplete.getPlace();
	  var lat = place.geometry.location.lat();
	  var lng = place.geometry.location.lng();

	  document.getElementById("lat").value = lat;
      document.getElementById("long").value = lng;
 });
  }
</script>
</body>

</html>