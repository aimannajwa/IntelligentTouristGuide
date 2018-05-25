<?php
	session_start();
		include_once('connectdb.php');
		
	
			
			$email = $_POST['email'];
	
	
	if ($email == "")
	{
		echo"<script type='text/javascript'>
	 	 	alert('Session end! Please login again!')
		    location.href='../login/login.php'
		 	</script>";
			exit();
	}
	
	else
	{
		
	
		$email2 = $email;
		
				
		
		
			if($email2 == true)
			{
				$sqlUpd="UPDATE login SET password='".('#ITG12345#')."' WHERE email='".$email2."'";
				$query=mysqli_query($con,$sqlUpd);
				if($query)
				{
					$from_add = "TEST"; 

						  $to_add = $email2; //<-- put your yahoo/gmail email address here
					  
						  $subject = "Intelligent Tourist Guide forgot password";
						  $message = " This is your new default password #ITG12345#. Please login to your account back. Thank you ";
						  
						  $headers = "MIME-Version: 1.0" . "\r\n";
						  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
						  $headers .= "From: $from_add \r\n";
						  $headers .= "Reply-To: $from_add \r\n";
						  $headers .= "Return-Path: $from_add\r\n";
						  $headers .= "X-Mailer: PHP \r\n";
						  
						  
						  if(mail($to_add,$subject,$message,$headers)) 
						  {
							  echo"<script type='text/javascript'>
							   alert('You may open your email to reset the password!')
							   location.href='../login/login.php'
							   </script>";
						  } 
						  else 
						  {
							 echo"<script type='text/javascript'>
							   alert('Please try again!')
							   location.href='index.php'
							   </script>";
						  }
						  
		       } 
			   
				else
				{
					echo "<script>alert('Your password has not update!');";
							echo "window.location.href = '../login/login.php';</script>";
				}
			}	
	}
		
		mysqli_close($con);
	?>
	<!-- stop php for lost form-->
	
	
	