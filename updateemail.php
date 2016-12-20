<?php
    session_start();
    include ('connection.php');
    
    // Get user_id and new email
    $user_id = $_SESSION['user_id'];
    $newemail = $_POST['email'];
    
    // Check if new email exists
    $sql = "SELECT * FROM users WHERE email = '$newemail'";
    $result = mysqli_query($link, $sql);
    $count = $count = mysqli_num_rows($result);
    if($count > 0){
        echo"
            <div class='alert alert-danger'>
                There is already as user registered with that email! Please choose another one!
            </div>
        "; exit;
    }
    
    // Get the current email
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    
?>