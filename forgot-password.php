<?php
    session_start();
    include('connection.php');
    
    // Assign error messages to variables
    $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
    $invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
    
    if(empty($_POST["forgotemail"])){
        $errors .= $missingEmail;
    } else {
        $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors .= $invalidEmail;   
        }
    }
    
    // Print errors (if there are any)
    if($errors){
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;
        exit;
    }
    
    
?>