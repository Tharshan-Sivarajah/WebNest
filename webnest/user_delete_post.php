<?php
include 'db-connect.php';

if(isset($_GET['udp_id']))
{
    $pid=$_GET['udp_id'];
    $sql="DELETE FROM post WHERE post_id= $pid";
    $delok= mysqli_query($conn,$sql);
    echo "<script>location.replace('frd_home.php')</script>";
}

?>