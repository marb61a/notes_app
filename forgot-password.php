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
    
    // If there are no errors
    // Assign query to variable
    $email = mysqli_real_escape_string($link, $email);
   
    // Run a db query to check if the email exists in the users table
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>'; 
        exit;
    }
    $count = mysqli_num_rows($result);
    
    // Print error message if email deoes not exist
    if($count != 1){
        echo '<div class="alert alert-danger">That email does not exist on our database!</div>';  
        exit;
    }
   
    // Get the user_id
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user_id = $row['user_id'];
   
?>