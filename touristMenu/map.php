<?php
		session_start();
		include_once('connectdb.php');
		
		if($_SESSION['email'] == "")
		{
			echo"<script type='text/javascript'>
	 	 	alert('Session end! Please login again!')
		    location.href='../login/login.php'
		 	</script>";
			exit();
		}
		
			$query="SELECT * FROM login where email='".$_SESSION['email']."' ";
			$db=mysqli_query($con,$query) or die(mysqli_error($con));
			$result=mysqli_fetch_assoc($db);
			$id=$result['id'];
			$username=$result['username'];
			
			
			
			
			

		
?>

<html xmlns="http://www.w3.org/1999/xhtml"><head id="Head1" runat="server">
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
   #directions-panel {
        margin-top: 10px;
        background-color:#CCCCCC;
        padding: 10px;
        overflow: scroll;
        height: 174px;
      }
        input[type=button]{
        width: 280%;
        background-color:   #666666;
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCB8JZOnPfDR61U6I0v2pZ4beGni3B838I&callback=initMap">
	
    </script>
    
   
   
    <script type="text/javascript">
       function initMap() {
		
		 var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
		
		  var options = { componentRestrictions: { country: 'MY'} };
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.Autocomplete(document.getElementById('start'), options);
			new google.maps.places.Autocomplete(document.getElementById('waypoints'), options);
            new google.maps.places.Autocomplete(document.getElementById('end'), options);
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });
 
	
		
        var map = new google.maps.Map(document.getElementById('dvMap'), {
          zoom: 6,
          center: (3.1412, 101.68653)
        });
        directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('dvPanel'));

        document.getElementById('route').addEventListener('click', function() {
          GetRoute(directionsService, directionsDisplay);
        });
      }

      function GetRoute(directionsService, directionsDisplay) {
        var waypts = [];
       var waypointstring;
       var waypoint1 = document.getElementById('waypoints').value; 

        waypointstring= waypoint1.split(";");
 //alert("Waypoint Length:" + waypointstring.length)

        for (var i = 0; i < waypointstring.length; i++) {

        waypts.push({location:waypointstring[i], stopover:true});
       }

        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
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
                
                     <div id="directions-panel" style="width: 30%; height: 100%; overflow:scroll; float: right; padding-right: 40px;">
                  
                        <strong style="font-size: 18px;">How Far Is Your Trip ?</strong><br><br>
                        <div class="table-responsive">
                        
                          <?php
			$query = "SELECT  place.longitude, place.latitude, place.locName FROM place INNER JOIN plan ON plan.placeId1=place.placeId ORDER BY
			 plan.planId DESC LIMIT 1 ";
			$db=mysqli_query($con,$query);
		$result=mysqli_fetch_assoc($db);
		
			$query2 ="SELECT place.longitude, place.latitude, place.locName FROM place INNER JOIN plan ON plan.placeId2=place.placeId ORDER BY plan.planId DESC LIMIT 1 ";
			$db2=mysqli_query($con,$query2);
		$result2=mysqli_fetch_assoc($db2);
		
		$query3 ="SELECT place.longitude, place.latitude, place.locName FROM place INNER JOIN plan ON plan.placeId3=place.placeId ORDER BY plan.planId DESC LIMIT 1 ";
		$db3=mysqli_query($con,$query3);
		$result3=mysqli_fetch_assoc($db3);
		
	

			?>
            
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
                                           <input type="text" id="start" value="<?php echo $result['locName'];?>" style="width: 200px" /><br><br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="  text-primary"></span>    
                                          Middle Point                                              
                                        </strong><br><br>
                                    </td>
                                    <td class="text-primary">
                                           <input type="text" id="waypoints" value="<?php echo $result2['locName'];?>" style="width: 200px" /><br><br>
                                    </td>
                                </tr>
                                
                                
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="  text-primary"></span>    
                                          Ending Point                                              
                                        </strong><br><br>
                                    </td>
                                    <td class="text-primary">
                                           <input type="text" id="end" value="<?php echo $result3['locName'];?>" style="width: 200px" /><br><br>
                                    </td>
                                </tr>

                                 
                                <tr>
                                    <td>
                                        <br><input type="button" id="route" value="Get Route" onClick="GetRoute()" />
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
