<?php 

$host = "localhost"; 
$username = "root"; 
$pw = ""; 
$dbname = "webnest";

$con= new mysqli($host, $username, $pw, $dbname);
if(!$conn){
    die("Database connection failed. Error: " .$this->conn->error);
}