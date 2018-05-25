<?php
session_start();
	include_once('connectdb.php');
				
				$id=$_GET['id'];
			$query="UPDATE login SET fullname='".$_POST['textName']."', email='".$_POST['textEmail']."', phoneno='".$_POST['textPhoneno']."',   state='".$_POST['textState']."' WHERE id=$id";
			$queryUpd=mysqli_query($con,$query) or die(mysqli_error($con));
				
			echo"<script type='text/javascript'>
				 alert('Successfully updated!')
				 location.href='pages-profile.php'
			</script>";
				 	
mysqli_close($con);
?>