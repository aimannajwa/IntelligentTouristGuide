<?php
session_start();
	include_once('connectdb.php');

if (isset($_POST['submit'])) {
	

	$query="SELECT email,password,role FROM login WHERE email='".$_POST['email']."' and 
	password='".($_POST['pass'])."'";
	$db=mysqli_query($con,$query);
	
	$result = mysqli_fetch_assoc($db);

	if (!$result)
	{
		echo"<script type='text/javascript'>
	 	 alert('Sorry! Wrong Email or Password')
		 location.href='login/login.php'
		 </script>";
	}
	else
	{
		 $_SESSION['email'] = $_POST['email'];
		
		 if($result['role'] == "admin")
		 {
			 echo "<meta http-equiv=\"refresh\" content=\"0; URL=adminMenu/lite/index.php\">";
		 }
		 else if ($result['role'] == "user")
		 {
			 echo "<meta http-equiv=\"refresh\" content=\"0; URL=touristMenu/index.php\">";
		 }
		 else
		 {
			echo"<script type='text/javascript'>
	 		alert('Sorry! Wrong Email or Password')
		 	location.href='login/login.php'
		 	</script>"; 
		 }
		 
	}
	mysqli_close($con);
}
?>

