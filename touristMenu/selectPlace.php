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
			$username=$result['username'];
			
		    $area=$_GET['area'];
			$tag=$_GET['tag'];
			
			
			$sql = "SELECT * FROM place where area='$area' && tag='$tag' ORDER BY placeId";  
            $rs_result = mysqli_query ($con,$sql);
			
			




			

			

		
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
 <section id="plan" class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="heading">
            <h3><span>Create Plan</span></h3>
          </div>
          <div class="sub-heading">
            <p>
              This is where you can create your plan! Let's begin!
            </p>
          </div>
        </div>
      </div>
      </div>
      
        <div class="container">
               <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for tag.." title="Type in a tag only">



</div>

<br>
     
                
                    <!-- column -->
                     <div class="row">
                     
                    <div class="col-md-12">
                            <div class="card-body">
                           
                                <div class="col-md-12">
                                
                                
               
                <form role="form" name="place"  method="POST" enctype="multipart/form-data" >                         
              <table id="placeTable" class=" table-striped table-bordered " cellspacing="1" width="100%">
              <thead>
                <tr>
                  <th >Place ID</th>
                  <th >Location Name</th>
                  <th >Address</th>
                  <th >Area</th>
                  <th >Tag</th>
                  <th >Description</th>
                  <th >Fees (RM)</th>
                  <th >Image</th>
                  <th >Update/Delete</th>     
                </tr>
              </thead>
              
              <tbody>
              <?php
		
			   		while($row=mysqli_fetch_array($rs_result))
					{ $id = $row['placeId'];
			   ?>
              	<tr>
                	<td><?php echo $row['placeId']; ?></td>
                    <td><?php echo $row['locName']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['area']; ?></td>
                    <td><?php echo $row['tag']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['fees']; ?></td>
                    <?php echo'
                    <td><img src="../adminMenu/lite/img/'.$row['image'].'" width="250" height="180" /></td> 
				    <td>
				    <input type="checkbox" class="place" name="placeId" value="'.$row['placeId'].'" onClick="keepCount()" id="placeId">
				    </td>
					
					'; ?>
                    
                </tr>
                <?php } ; ?>
   
      </tbody>
      </table>
     
       <input type="hidden" name="area" value="<?php echo $area ?>">
         <input type="hidden" name="tag" value="<?php echo $tag ?>">
             
            
               
             
                 <br> 
                 
                  <div class="btnn">
                  <center>
    <a href="plan.php"><button type="button" class="btn btn-danger" name="cancel">Cancel</button></a>
       <a href="plan2.php"> <button type="submit"  id="requestthis" class="btn btn-success">Next Destination</button></a>
         
      
  <br><br>
  </center>
  </div>
  </form>
 
			
		        
                 </div>
                 </div>
                 </div>
                 </div>
                 
      
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


<SCRIPT LANGUAGE="javascript">
var max_limit = 1; // Max Limit
$(document).ready(function (){
    $(".place:input:checkbox").each(function (index){
        this.checked = (".place:input:checkbox" < max_limit);
    }).change(function (){
        if ($(".place:input:checkbox:checked").length > max_limit){
			alert('You may click at one(1) place only per category!')
            this.checked = false;
        }
    });
});
</SCRIPT>

<script>

 function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("placeTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
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

<script type="text/javascript">
    $(function() { //ready function
        $('#requestthis').on('click', function(e){ //click event
            e.preventDefault(); //prevent the click from redirecting you to "submitrequest.php"

            var placeId = $('#placeId').val();
			
            var url = "plan2.php?placeId="+placeId;

            window.location.replace(url);
            //OR 
            //window.location.href = url;
        })
    })
</script>

