<?php
include "../db-connect.php";
if(isset($_GET['post_id']))
{
    $postid= $_GET['post_id'];

    $sql="DELETE from post WHERE post_id= $postid";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
        echo "<script>alert('Deleted')</script>";
        echo "<script>location.replace('post_details.php')</script>";
        
    }
    else{
        
        die(mysqli_error($res));
    }

}

?>