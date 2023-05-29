<?php 

include"../db-connect.php";
if(isset($_POST['signup']))
{
error_reporting(1);
	//$con=mysqli_connect("localhost","root","","webnest");
	
	
	$Email=$_POST['email'];

	$que1=mysqli_query($conn,"select * from users where Email='$Email'");
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
                $mail=$_POST['email'];
           
		
		//$que2="insert into users(user_id,Name,Email,Password,Gender,Birthday_Date,FB_Join_Date) values(,'Tharshan Tharshan','tharshanthar@gmail.com','tharshan99','male','1999/12/11',now())";
                        $que2="insert into users(Name,Email,Password,Gender,Birthday_Date,FB_Join_Date) values('$Name','$mail','$Password','$Gender','$Birthday_Date',now())";
                        $reu=mysqli_query($conn,$que2);

			session_start();
			$_SESSION['tempfbuser']=$Email;
                 
		
            
			if($Gender=="Male")
			{        echo "<script>window.location.href='u_profilepic_m.php'</script>";
				 //header ("Location:u_profilepic_m.php"); 
            }
                       else
                        {        echo "<script>window.location.href='u_profilepic_f.php'</script>";
				//header ("Location:u_profilepic_f.php");
			}
			
		
	}
}
?>
