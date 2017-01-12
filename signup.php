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
    
    // Create a unique activation code
    $activationKey = bin2hex(openssl_random_pseudo_bytes(16));
    
    // Insert user details and activation code in the users table
    $sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES 
        ('$username', '$email', '$password', '$activationKey')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>';
        exit;
    }
    
    // Send email with link to resetpassword.php with user id and activation code
    $message = "Please click on this link to activate your account:\n\n";
    $message .= "". urlencode($email) . "&key=$activationKey";
    if(mail($email, 'Reset your password', $message, 'From:'.'developmentisland@gmail.com')){
        echo "<div class='alert alert-success'>Thank for your registring! A confirmation email has been sent to $email. 
        Please click on the activation link to activate your account.</div>";
    }
    
?>