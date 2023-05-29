<?php
include "../db-connect.php";
//------------------------------------ user delete--------------------------------------------------//
if(isset($_GET['adid']))
{
    $adminid= $_GET['adid'];

    $sql="UPDATE users SET password='' WHERE user_id= $adminid";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
        echo "<script>alert('Deleted')</script>";
        echo "<script>location.replace('user_info.php')</script>";
        
    }
    else{
        die(mysqli_error($con));
    }

}


   
?>

