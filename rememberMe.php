<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<pre>&lt;?php  session_start(); 
 if(!empty($_POST[&quot;login&quot;])) {  	
$conn = mysqli_connect(&quot;localhost&quot;, &quot;root&quot;, &quot;&quot;, &quot;blog_samples&quot;); 
 	$sql = &quot;Select * from members where member_name = '&quot; . $_POST[&quot;member_name&quot;] . &quot;' and member_password = '&quot; . md5($_POST[&quot;member_password&quot;]) . &quot;'&quot;;  	
$result = mysqli_query($conn,$sql);  	$user = mysqli_fetch_array($result); 
 	if($user) {  			$_SESSION[&quot;member_id&quot;]		   = $user[&quot;member_id&quot;];  			
 if(!empty($_POST[&quot;remember&quot;])) {  				setcookie (&quot;member_login&quot;,$_POST[&quot;member_name&quot;],time()+ (10 * 365 * 24 * 60 * 60));  
				setcookie (&quot;member_password&quot;,$_POST[&quot;member_password&quot;],time()+ (10 * 365 * 24 * 60 * 60));  			}

 else {  				if(isset($_COOKIE[&quot;member_login&quot;])) {  					setcookie (&quot;member_login&quot;,&quot;&quot;);  				} 


 				if(isset($_COOKIE[&quot;member_password&quot;])) {  					setcookie (&quot;member_password&quot;,&quot;&quot;);  				}  			}  	} else {  		$message = &quot;Invalid Login&quot;;  	}  }  ?&gt;</pre>
</body>
</html>