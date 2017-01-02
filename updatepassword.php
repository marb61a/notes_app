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
        
        // Check if password given is correct
        $user_id = $_SESSION["user_id"];
        $sql = "SELECT password FROM users WHERE user_id='$user_id'";
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if($count !== 1){
            echo '<div class="alert alert-danger">There was a problem running the query</div>';
        } else {
            $row = mysqli_fetch_array($result, MYSQL_ASSOC);
            if($currentPassword != $row['password']){
                $errors .= $incorrectCurrentPassword;
            }
        }
    }
    
    
    // If error occurs print error message
    if($errors){
        $resultMessage = "<div class='alert alert-danger'>$errors</div>";
        echo $resultMessage;
    } else {
        $password = mysqli_real_escape_string($link, $password);
        $password = hash('sha256', $password);
        
        // Run query and update password
        $sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo "<div class='alert alert-danger'>The password could not be reset. Please try again later.</div>";
        } else {
            echo "<div class='alert alert-success'>Your password has been updated successfully.</div>";
        }
    }
    
?>