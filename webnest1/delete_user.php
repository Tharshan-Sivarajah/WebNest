<?php
include 'db-connect.php';
    if(isset($_GET['res']))
    {
        $u_id=$_GET['user_id'];
  
        $sql="UPDATE users SET password= ' ' WHERE user_id= $u_id ";
        $res=mysqli_query($conn,$sql);
        echo "<script>location.replace(' pro/index2.php')</script>";
       
    }
?>