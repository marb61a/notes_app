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
?>