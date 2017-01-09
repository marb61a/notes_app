<!--This file receives: user_id, generated key to reset password, password1 and password2-->
<!--This file then resets password for user_id if all checks are correct-->
<?php
    session_start();
    include('connection.php');
    
    // If user_id or key is missing
    if(!isset($_POST['user_id']) || !isset($_POST['key'])){
        echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email.</div>';
        exit;
    }
    
    // Else, store user_id or key in variables
    $user_id = $_POST['user_id'];
    $key = $_POST['key'];
    $time = time() - 86400;
    
    // Prepare variables for the db query
    $user_id = mysqli_real_escape_string($link, $user_id);
    $key = mysqli_real_escape_string($link, $key);
    
    // Run db query which checks combination of user_id & key exists and is less than 24h old
    $sql = "SELECT user_id FROM forgotpassword WHERE rkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
    $result = mysqli_query($link, $sql);
        
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query</div>';
        exit;
    }
    
    // If the combination does not exist, show an error
    $count = mysqli_num_rows($result);
    if($count !== 1){
        echo '<div class="alert alert-danger">Please try again.</div>';  
        exit;
    }
    
    // Error messages defined and assigned to variables
    $missingPassword = '<p><strong>Please enter a Password!</strong></p>';
    $invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
    $differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
    $missingPassword2 = '<p><strong>Please confirm your password</strong></p>';
    
?>