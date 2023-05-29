<?php
if(isset($_POST['Login']))
{error_reporting(1);
	include '../db-connect.php';
	

	$user=$_POST['username'];
	$pass=$_POST['password'];

	$que2=mysqli_query($conn,"select * from wnadmin where email='$user' and ad_pw='$pass'");
	$count2=mysqli_num_rows($que2);
	
	$que1=mysqli_query($conn,"select * from users where Email='$user' and Password='$pass'");
	$count1=mysqli_num_rows($que1);

	
	if($count2>0)
	{
		session_start();
					$_SESSION['fbuser']=$user;
					$query1=mysqli_query($conn,"select admin_type from wnadmin where email='$user'");
					$rec1=mysqli_fetch_array($query1);
				
					// mysqli_query($con,"update user_status set status='Online' where user_id='$userid'");
						
						header("location:../admin_dashbord/super_admin.php");
					
							
	}
	elseif($count1>0)
	{
		session_start();
					$_SESSION['fbuser']=$user;
					$query1=mysqli_query($conn,"select * from users where Email='$user'");
					$rec1=mysqli_fetch_array($query1);
					$userid=$rec1[0];
					
					header("location:../webpro.php");
	}
	elseif($count5>0)
	{
		header("location:../pro/Invalid_Password.php");
	}
	else
	{
		header("location:../pro/Invalid_Username.php");
	}
    
       
}

?>
