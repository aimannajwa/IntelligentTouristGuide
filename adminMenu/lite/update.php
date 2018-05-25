<?php
session_start();
	include_once('connectdb.php');
	
	$placeId=$_GET['placeId'];	
	
	
	
				
$query="UPDATE place SET locName='".$_POST['locName']."', latitude='".$_POST['latitude']."', longitude='".$_POST['longitude']."', address='".$_POST['address']."', area='".$_POST['area']."', tag='".$_POST['tag']."', description='".$_POST['description']."', fees='".$_POST['fees']."' where placeId = $placeId";


			$queryUpd=mysqli_query($con,$query) or die(mysqli_error($con));
				
			echo"<script type='text/javascript'>
				 alert('Successfully updated!')
				 location.href='updateDelete.php'
			</script>";
				 	
mysqli_close($con);
?>
