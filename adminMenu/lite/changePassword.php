<?php
session_start();
	include_once('connectdb.php');
	$query="SELECT password FROM login WHERE password='".($_POST['textPassword'])."' and email='".$_POST['textEmail']."'";
	$db=mysqli_query($con,$query);
	$result = mysqli_fetch_assoc($db);
	if ($result)
	{		
		$queryInsert2="UPDATE login SET password='".($_POST['textConfirmPassword'])."' WHERE email='".$_POST['textEmail']."'";
		$dbInsert2=mysqli_query($con,$queryInsert2) or die(mysqli_error($con));
		
		echo"<script type='text/javascript'>
	 	 alert('Successfully change! Please Login!')
		 </script>";
		 
		 echo "<meta http-equiv=\"refresh\" content=\"0; URL=../../login/login.php\">";
	}
	else
	{
		echo"<script type='text/javascript'>
	 	 alert('Current Password Wrong!')
		 </script>";
		 
		  echo "<meta http-equiv=\"refresh\" content=\"0; URL=pages-profile.php\">";
	}
mysqli_close($con);
?>