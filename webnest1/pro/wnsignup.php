<?php
if(isset($_POST['signup']))
{
error_reporting(1);
	$con=mysqli_connect("localhost","root","","webnest");
	
	
	$Email=$_POST['email'];

	$que1=mysqli_query($con,"select * from users where Email='$Email'");
	$count1=mysqli_num_rows($que1);

	$Birthday_Date=$_POST['date'];
	$n=date("Y");
	$y=$n-$Birthday_Date;

	if($count1>0)
	{
		echo "<script>alert(' There is an existing account associated with this email.')</script>";
		echo "<script>location.replace('index2.php')</script>";

		// echo "<div style='background-color:#ae1b1b;color:#fff;margin-top:40%;width:40%;padding:10px;margin-left:10%;font-size:20px;'>There is an existing account associated with this email.</div>";
			
	}
	elseif($y<18)
	{
		echo "<script>alert('user must be older than 18 years......!')</script>";
		echo "<script>location.replace('index2.php')</script>";

	}
	else
	{
		$Name=$_POST['first_name'].' '.$_POST['last_name'];
		$Password=$_POST['password'];
		$Gender=$_POST['sex'];
		$Birthday_Date=$_POST['date'];
		
		
		
			$que2=mysqli_query($con,"insert into users(Name,Email,Password,Gender,Birthday_Date,FB_Join_Date) values('$Name','$Email','$Password','$Gender','$Birthday_Date',now())");

			session_start();
			$_SESSION['tempfbuser']=$Email;
		
            
			if($Gender=="Male")
			{
				 header ("Location:u_profilepic_m.php"); 
            }
			else
			{
				header ("Location:u_profilepic_f.php");
			}
			
		
	}
}
?>
