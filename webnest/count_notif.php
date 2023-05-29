<?php
   session_start();
   $no_user_id=$_SESSION['user_id'];
   
   include 'db-connect.php';

   $status_query = "SELECT * FROM notification WHERE notif_status=0 AND res_id= $no_user_id ";
   $result_query = mysqli_query($conn, $status_query);

   echo $result_query->num_rows; 


?>