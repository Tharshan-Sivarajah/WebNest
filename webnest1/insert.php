<?php

function notification()
{
    include 'db-connect.php';
$subject = mysqli_real_escape_string($conn, $_POST["subject"]);
//$comment = mysqli_real_escape_string($con, $_POST["comment"]);
$comment=100;
$query = "INSERT INTO notification VALUES (null,2,'$subject', now(),0 )";
mysqli_query($conn, $query);
}
?>