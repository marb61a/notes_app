<?php 
    session_start();
    // Connect to DB
    include("connection.php");
    // Check user inputs and define error messages
    $missingEmail = '<p><stong>Please enter your email address!</strong></p>';
    $missingPassword = '<p><stong>Please enter your password!</strong></p>'; 
    
    if (empty($_POST["loginemail"])) {
        $errors .= $missingEmail;
    } else {
        $email = filter_var($_POST["loginemail"], FILTER_SANATIZE_EMAIL);
    }
    
    if (empty($_POST["loginpassword"])) {
        $errors .= $missingPassword;
    } else {
        $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
    }
    
?>