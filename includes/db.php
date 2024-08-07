<?php 
$servername = "localhost";
$username = "root"; //default XAMPP username 
$password = ""; //default XAMPP password 
$dbname = "addi"; //db name

//create a connection 
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection 
if ($conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
}