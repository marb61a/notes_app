<?php
    // Start session
    session_start();
    include('connection.php');
    
    // Define error messages and assign to variables
    $missingUsername = '<p><strong>Please enter a username!</strong></p>';
    $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
    $invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
    $missingPassword = '<p><strong>Please enter a Password!</strong></p>';
    $invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
    $differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
    $missingPassword2 = '<p><strong>Please confirm your password</strong></p>';
    
    // Get Username
    if(empty($_POST["username"])){
        $errors .= $missingUsername;
    } else {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    }
    
    // Get email address
    if(empty($_POST["email"])){
        $errors = $missingEmail;
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL); 
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors .= $invalidEmail;
        }
    }
    
    // Get passwords
    if(empty($_POST["password"])){
        $errors .= $missingPassword;    
    } elseif (!(strlen($_POST["password"]) > 6
        and preg_match('/[A-Z]/',$_POST["password"])
        and preg_match('/[0-9]/',$_POST["password"]))
    ) {
        $errors .= $invalidPassword;    
    } else {
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        if (empty($_POST["password2"])) {
            $errors .= $missingPassword2;    
        } else {
            $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
            
            if($password !== $password2){
                $errors .= $differentPassword;
            }    
        }
    }
    
    // Print errors (if there are any)
    if($errors){
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;
        exit;
    }
    
    // No errors, prepare for db query
    $username = mysqli_real_escape_string($link, $username);
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    $password = hash('sha256', $password);
    
    // If username exists in users table print an error
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($link, $sql);
        
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query</div>';
        exit;
    }
    
    $results = mysqli_num_rows($result);
    if($results){
        echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';
        exit;
    }
    
?>