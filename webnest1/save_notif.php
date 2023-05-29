<?php
include "db-connect.php";

    class noti
    {
        public function com_save_noti()
        {
            $sql_noti="INSERT INTO notification VALUES(null,1,10,'like',now(),0)";
            $res_noti=mysqli_query($conn,$sql_noti);

            if( $res_noti)
            {
                echo "save";
            }
        }
    }
?>