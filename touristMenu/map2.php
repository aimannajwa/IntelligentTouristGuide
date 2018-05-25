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
			
			
			
			
			

		
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
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
  
   <style>
     #dvPanel {
        margin-top: 10px;
        background-color:#CCCCCC;
        padding: 10px;
        overflow: scroll;
        height: 174px;
      }
        input[type=button]{
        width: 280%;
        background-color:   #81a1c1;
        color: white;
        padding: 14px 20px;
        padding-right: 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        align-content: center;
      
        }

        input[type=button]:hover
        {
        background-color:   #81b1c1;
        }

        input
        {
        
          width: 100%;
        }
    </style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCB8JZOnPfDR61U6I0v2pZ4beGni3B838I"></script>
    <script type="text/javascript">
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        var options = { componentRestrictions: { country: 'MY'} };
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.Autocomplete(document.getElementById('txtSource'), options);
			
            new google.maps.places.Autocomplete(document.getElementById('txtDestination'), options);
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });
 
        function GetRoute() {
            var map = new google.maps.LatLng(3.1412, 101.68653);
            var mapOptions = {
                zoom: 7,
                center: map
            };
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));
 
            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
			
            destination = document.getElementById("txtDestination").value;
 
            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });
 
            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    document.getElementById("lblDistance").innerHTML = distance;
                    document.getElementById("hfDistance").value = distance;
                    document.getElementById("lblDuration").innerHTML = duration;
                     document.getElementById("duration").value = duration;

                    } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
    </script>
  
  
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
 <form id="form1" runat="server">
    <asp:ScriptManager runat="server" />
    <div>
        
                    
                
                    <div id="dvDistance">
                    </div>
                
            
                    <div id="dvMap" style="width: 60%; height: 100%; float: left; padding-left: 50px;">
                    </div>
                
                     <div id="dvPanel" style="width: 30%; height: 100%; overflow:scroll; float: right; padding-right: 40px;">
                    <?php
			$query = "SELECT place.longitude, place.latitude, place.locName FROM place INNER JOIN plan ON plan.placeId1=place.placeId ORDER BY
			 plan.planId DESC LIMIT 1  ";
			$db=mysqli_query($con,$query);
		$result=mysqli_fetch_assoc($db);
		
			$query2 ="SELECT place.longitude, place.latitude, place.locName FROM place INNER JOIN plan ON plan.placeId2=place.placeId ORDER BY
			 plan.planId DESC LIMIT 1 ";
			$db2=mysqli_query($con,$query2);
		$result2=mysqli_fetch_assoc($db2);
		
			
			
			?>
                        <strong style="font-size: 18px;">How Far Is Your Trip?</strong><br><br>
                        <div class="table-responsive">
                        <table class="table table-condensed table-responsive table-user-information">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="  text-primary"></span>    
                                           Starting Point                                              
                                        </strong><br><br>
                                    </td>
                                    <td class="text-primary">
                                           <input type="text" id="txtSource" value="<?php echo $result['locName'];?>" style="width: 200px" /><br><br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="  text-primary"></span>    
                                          Ending Point                                              
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                           <input type="text" id="txtDestination" value="<?php echo $result2['locName'];?>" style="width: 200px" />
                                    </td>
                                </tr>

                                 
                                <tr>
                                    <td>
                                        <br><input type="button" value="Get Route" onClick="GetRoute()" />
                                        <asp:Button ID="btn_submit" runat="server" Text="Processed" OnClick="GetDistance" />
                                    </td>
                                    
                                   
                                </tr>
                                <tr>
                                    <td>
                                        <input type="button" value="Back To Home"  onclick="backMap()" />
                                    </td>
                                </tr>

                     
                   
                </tbody>
            </table>
            <hr>
        </div>
    </div>
           <script>
               function backMap()
               {
                window.location.href='../touristMenu/index.php';
               }
           </script>     
    </div>
    </form>
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
<script type="text/javascript">
    $(function() { //ready function
        $('#requestthis').on('click', function(e){ //click event
            e.preventDefault(); //prevent the click from redirecting you to "submitrequest.php"

            var area = $('#area').val();
            var url = "selectCategory.php?area="+area;

            window.location.replace(url);
            //OR 
            //window.location.href = url;
        })
    })
</script>