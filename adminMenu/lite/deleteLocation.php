<?php
session_start();
	include_once('connectdb.php');
	
		$sqlIns="DELETE FROM place WHERE placeId='".$_GET['placeId']."'";
		$queryInsert=mysqli_query($con,$sqlIns) or die(mysqli_error($con));
		
		echo"<script type='text/javascript'>
	 	 alert('Successfully remove the place!')
		 </script>";
		 
		 echo "<meta http-equiv=\"refresh\" content=\"0; URL=updateDelete.php\">";
	
mysqli_close($con);
?>