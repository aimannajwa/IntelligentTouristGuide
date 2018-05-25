<?php
//session_start();
	include_once('connectdb.php');

if (isset($_POST['submit'])) {
	
	//session_start();
	$fullname = mysql_real_escape_string($_POST['name']) ;
	$email = mysql_real_escape_string($_POST['email']);
	$state = mysql_real_escape_string($_POST['state']);
	$phoneno = mysql_real_escape_string($_POST['phoneno']);
	$username = mysql_real_escape_string($_POST['username']);
	$password1 = mysql_real_escape_string($_POST['pass']);
	$password2 = mysql_real_escape_string($_POST['repeatpass']);
	
	if ($password1 == $password2)
	{
		$password1 = ($password1);
		
		$query = "INSERT into login (fullname, email, state, phoneno, username, password,role) VALUES ('$fullname', '$email', '$state', '$phoneno', '$username','$password1','user')";
		
		 mysqli_query($con, $query);
		
		
		
			echo"<script type='text/javascript'>
	 		alert('Registered')
		 	location.href='../IntelligentTouristGuide/login/login.php'
		 	</script>"; 
	}
		
		
	else 
	{
		echo"<script type='text/javascript'>
	 		alert('Password do not match!')
		 	location.href='../IntelligentTouristGuide/register/register.php'
		 	</script>"; 
	}
}
?>




		
		<!--
		
		$_SESSION['message'] = "Register session is succeed! Now, please log in into your account.";
		
		$_SESSION['email'] = $email;
		
		header ("location: ../login/login.php");
	
	}else{
		$_SESSION['message'] = "The two passwords do not match";
	}
}
?>
-->
	