<?php 
	include_once 'Comment.php';
	include "db-connect.php";

	$com = new Comment();
	if (isset($_POST['submit'])) {
		$name    = $_POST['name'];
		$comment = $_POST['comment'];
		$cid = $_POST['cid'];
		$re_id=$_POST['res_id'];
		

		if (empty($name) || empty($comment) || empty($cid)) {
			echo "<script>alert('Field must not be empty !')</script>";
		} else {
			$com->setData($name, $comment,$cid);
			if ($com->create()) {
				$sql_noti="INSERT INTO notification VALUES(null,'$cid','$re_id','Comment',now(),0)";
            	$res_noti=mysqli_query($conn,$sql_noti);
				
				echo "<script>location.replace(' webpro.php')</script>";
			}
		}
	}
 ?>