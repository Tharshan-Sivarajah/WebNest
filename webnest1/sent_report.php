<?php 
include 'db-connect.php';
	if(isset($_POST['ok']))
		{
           
			$report=$_POST['report'];
			$pid=$_POST['post_id'];
			$usid=$_POST['r_userid'];
			$repid=$_POST['report_id'];
			$uemail=$_POST['mail'];

			$sql_rep="INSERT INTO report VALUES(null,'$usid','$repid','$uemail','$report','$pid',now(),0)";
			$okres=mysqli_query($conn,$sql_rep);

			echo "<script>alert('Sent your report')</script>";
			echo "<script>location.replace('webpro.php')</script>";


			}
?>