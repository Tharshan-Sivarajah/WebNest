<?php
    if(isset($_GET['uid']))
    {
       
        $userid= $_GET['uid'];
        $sender= $_GET['sid'];
       

       include 'db-connect.php';
        $sql=mysqli_query($conn,"INSERT INTO requests VALUES(null, '$userid', '$sender', now() ,0 )");
        $sql_noti="INSERT INTO notification VALUES(null,'$userid','$sender', 'Friend Request' , now() ,0 )";
        $res_noti=mysqli_query($conn,$sql_noti);

        if( $res_noti)
        {
            echo "<script>alert('Sent Request')</script>";
            echo "<script>location.replace(' home_frd.php')</script>";
        }
        
    }

?>