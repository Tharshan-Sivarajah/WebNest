<?php
	session_start();
	// error_reporting(1);
	// $user=$_SESSION['fbuser'];
	// $con=mysqli_connect("localhost","root","","webnest");
	
	// $query1=mysqli_query($con,"select * from users where Email='$user'");
	// $rec1=mysqli_fetch_array($query1);
	// $userid=$rec1[0];
	// mysqli_query($con,"update user_status set status='Offline' where user_id='$userid'");
	unset($_SESSION['fbuser']);
	//session_destroy();

	echo "<script>location.replace('index2.php')</script>"; 
?>