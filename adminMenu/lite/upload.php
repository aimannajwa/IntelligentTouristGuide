<?php
		session_start();
		include_once('connectdb.php');
		
			
		 
	
		
		$placeId=$_GET['placeId'];
			
		$img = $_FILES['fileToUpload']['name'];
		$img_temp = $_FILES['fileToUpload']['tmp_name'];
		$targetFile = "img/".basename($img);
		
		
		$image = addslashes(file_get_contents($img_temp));
		$imageName = addslashes($_FILES['fileToUpload']['type']);
		
		
		
		
		move_uploaded_file($img_temp, $targetFile);
		
	
		
		
		$queryIns="Update place SET image='{$img}', imgName='{$image}', imagePath='http://localhost/IntelligentTouristGuide/adminMenu/lite/img/$img' where placeId=$placeId ";
		
		
		
		$db=mysqli_query($con,$queryIns);
		
		if ($db)
	{		
		
		echo"<script type='text/javascript'>
	 	 alert('Image has been successfully updated!')
		 location.href='updateDelete.php'
		 </script>";
		 
		
	}
	else
	{
		echo"<script type='text/javascript'>
	 	 alert('Image are failed to updated!')
		 location.href='updateLocation.php'
		 </script>";
		 
		 
	}
mysqli_close($con);
		
	
	
	
?>