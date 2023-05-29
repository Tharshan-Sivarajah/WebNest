<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
           
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE user_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../index2.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{  
        header("location: ../index2.php");
    }
?>


