<?php
	if(isset($_POST['add']))
		{

            $sql_add="INSERT INTO friends( f_user_id,frd_id,add_date) VALUES($userid,$res_id, now())";
            $done_add=mysqli_query($conn,$sql_add);


            if( $done_add)
            {
            $sql_status="UPDATE requests SET r_status= 1 WHERE reseiver_acc= $userid";
            $done_status=mysqli_query($conn,$sql_status);

                echo "<script>location.replace('home_frd.php')</script>";
            }

		}


    if(isset($_POST['remove']))
    {
       
	    $sql_del="DELETE FROM requests WHERE r_id = '$tabl_id' ";
        mysqli_query($conn, $sql_del);

        echo "<script>location.replace('home_frd.php')</script>";
    }

?>