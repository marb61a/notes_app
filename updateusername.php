<?php
    // Start Session and Connect
    session_start();
    include ('connection.php');
    
    // Get user ID
    $id = $_SESSION['user_id'];
    
    // Get the Username sent through AJAX
    $username = $_POST['username'];
    
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
    }
?>