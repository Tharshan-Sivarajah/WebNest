<?php
session_start();
include 'db-connect.php';					
			 
    $sql2="SELECT c_user_id,comments FROM com INNER JOIN post on com.p_id= post.post_id ";
    $res2=mysqli_query($conn,$sql2);
				 
	if(mysqli_num_rows($res2)>0)
    {
        while($row=mysqli_fetch_array($res2))
        {
            echo "<li><br>{$row["c_user_id"]}: </b> {$row["comments"]}</li>";
        }
    }
						 
				
	?>


