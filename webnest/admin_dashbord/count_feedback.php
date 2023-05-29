<?php
      
   include '../db-connect.php';

   $status_query = "SELECT *FROM feedback WHERE f_status=0; ";
   $result_query = mysqli_query($conn, $status_query);

   echo $result_query->num_rows; 
   


?>