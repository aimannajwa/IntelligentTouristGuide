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
		
			$query="SELECT * FROM login where email='".$_SESSION['email']."'";
			$db=mysqli_query($con,$query) or die(mysqli_error($con));
			$result=mysqli_fetch_assoc($db);
			$email=$result['email'];
			$id=$result['id'];
			
			$query2="select *  FROM plan where id='$id'";
			$db2=mysqli_query($con,$query2) or die(mysqli_error($con));
			$row=mysqli_num_rows($db2);
			
		if($row == 3)
		
		{
			$from_add = "TEST"; 

	$to_add = $email; //<-- put your yahoo/gmail email address here

	$subject = "Intelligent Tourist Guide";
	$message = "CONGRATULATIONS! Use this code to get RM30 off when you spend min. RM50 at 7eleven! Expired on 31 March 2018 --E7235MY-- ";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	
	
	if(mail($to_add,$subject,$message,$headers)) 
	{
		echo"<script type='text/javascript'>
	 	 alert('You may open your email to get the discount code!')
		 location.href='index.php'
		 </script>";
	} 
	else 
	{
 	   echo"<script type='text/javascript'>
	 	 alert('Enjoy the trip!')
		 location.href='plan.php'
		 </script>";
	}
	
		}
		
		else 
	{
 	   echo"<script type='text/javascript'>
	 	 alert('Enjoy the trip!')
		 location.href='plan.php'
		 </script>";
	}





?>