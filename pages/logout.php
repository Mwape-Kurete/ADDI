<?php
session_start();

if (isset($_POST['logout-button'])) {
    print_r($_SESSION); // To check if session variables are present
    session_destroy(); //ending the current users session

    header('location: /addi/pages/login.php');
    exit();
}
