
<?php
include "../db-connect.php";
if(isset($_GET['admin_id']))
    {
        $a_id= $_GET['admin_id'];
        $sql1= "DELETE from wnadmin WHERE a_id= $a_id";
        $res1=mysqli_query($con,$sql1);
        if($res1)
        {
            echo "<script>location.replace('admin_info.php')</script>";
        }
        else{
            die(mysqli_error($con));
        }

    }
?>