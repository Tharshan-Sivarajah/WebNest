<?php
include '../db-connect.php';

if(isset($_GET['Ad_dp_id']))
{
    $pid=$_GET['Ad_dp_id'];
    $sql="DELETE FROM post WHERE post_id= $pid";
    $delok= mysqli_query($conn,$sql);
    echo "<script>location.replace('display_post.php')</script>";
}

?>