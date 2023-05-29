<?php
     if(isset($_POST['remove']))
     {
        
         $sql_del="DELETE FROM requests WHERE r_id = '$tabl_id' ";
         mysqli_query($conn, $sql_del);
 
         echo "<script>location.replace('home_frd.php')</script>";
     }


?>