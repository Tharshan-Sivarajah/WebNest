<?php
session_start();
include 'db-connect.php';
    if(isset($_GET['res']))
    {
        $u_id=$_GET['user_id'];
        $reason=$_GET['res'];
        $sug=$_GET['sug'];
  
        $sql="UPDATE users SET password= ' ' WHERE user_id= $u_id ";
        $res=mysqli_query($conn,$sql);
        $sql2="INSERT INTO delete_user(user_id,reason,suggestion,d_date) VALUES('$u_id','$reason',' $sug',now())";
        $res2=mysqli_query($conn,$sql2);
        unset($_SESSION['fbuser']);
        echo "<script>location.replace('../pro/index2.php')</script>";
       
    }
?>