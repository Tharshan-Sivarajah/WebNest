<?php
include 'db-connect.php';

if(isset($_GET['uid']))
	{
        $u_id=$_GET['uid'];

	    $sql_del="DELETE FROM friends WHERE F_Id = '$u_id' ";
        mysqli_query($conn, $sql_del);

        echo "<script>location.replace('home_frd.php')</script>";
    }

?>