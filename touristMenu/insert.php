<?php
		session_start();
		include_once('connectdb.php');
		
			
			if(isset($_POST['submit']))
	{
		
$checkbox1 = $_POST['checkbox'];
$chk=""; 
foreach($checkbox1 as $chk1) 
{ 
$chk.= $chk1.","; 
} 

if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO plan(id, placeId, area)VALUES( '$chk' )";
if(mysqli_query($conn,$sql)) {
echo 'Data added sucessfully';
} 
else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

		$area = $_POST['Area'];
		
		
		$queryIns="INSERT INTO plan (area,placeId) VALUES ( '$area') "; 
		
		$db=mysqli_query($con,$queryIns);
		
		if ($db)
	{		
		
		echo"<script type='text/javascript'>
	 	 alert('Place has been successfully inserted!')
		 location.href='selectPlace.php'
		 </script>";
		 
		
	}
	else
	{
		echo"<script type='text/javascript'>
	 	 alert('Place are failed to inserted!')
		 location.href='plan.php'
		 </script>";
		 
		 
	}
mysqli_close($con);
		
	}
?>