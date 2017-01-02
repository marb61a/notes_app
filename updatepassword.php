<?php
    // Start session and connect
    session_start();
    include('connection.php');
    
    // Define error message as variables
    $missingCurrentPassword = '<p><strong>Please enter your Current Password!</strong></p>';
    $incorrectCurrentPassword = '<p><strong>The password entered is incorrect!</strong></p>';
    $missingPassword = '<p><strong>Please enter a new Password!</strong></p>';
    $invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
    $differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
    $missingPassword2 = '<p><strong>Please confirm your password</strong></p>';
    
    // Check for errors
    if (empty($_POST["currentpassword"])) {
        $errors .= $missingCurrentPassword;
    } else {
        $currentPassword = $_POST["currentpassword"];
        $currentPassword = filter_var($currentPassword, FILTER_SANATIZE_STRING);
        $currentPassword = mysqli_real_escape_string ($link, $currentPassword);
        $currentPassword = hash('sha256', $currentPassword);
    }
    
?>