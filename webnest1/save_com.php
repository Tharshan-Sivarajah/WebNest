
<?php
include 'db-connect.php';

        $sql3= "INSERT INTO com (post_id,comments)VALUES('{$_POST["na"]}' ,'{$_POST["me"]}')";
        $res3=mysqli_query($conn,$sql3);					
								
        if($res3)
        {
            echo "<script> alert('save coment')</script>";
        }
        else{
            echo "<script> alert('Unsave comment')</script>";
        }					
    	
?>