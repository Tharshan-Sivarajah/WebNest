<?php 

$host="localhost";
$us="root";
$pw="";
$db="webnest";

$conn=mysqli_connect($host,$us,$pw,$db);
if(!$conn){
    die("Database connection failed. Error: ");
    // .$this->conn->error
}