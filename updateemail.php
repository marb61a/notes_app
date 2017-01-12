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
    
    if($count == 1){
        $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
        $email = $row['email'];
    } else {
        echo "<div class='alert alert-danger'>There was an error retrieving the email from the database</div>";
        exit;
    }
    
    // Create a unique activation code
    $activationKey = bin2hex(openssl_random_pseudo_bytes(16));
    
    // Insert new activation code in the users table 
    $sql = "UPDATE users SET activation2='$activationKey' WHERE user_id = '$user_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
        exit;
    }
    
    // Send email with link to activatenewemail.php with current email, new email and activation code
    $message = "Please click on this link to prove you own this email address\n\n";
    $message .= "/activatenewemail.php?email=" . urlencode($email) . "&newemail=" . urlencode($newemail) . "&key=$activationKey";
    if(mail($email, 'Email update', $message, 'From:'.'developmentisland@gmail.com')){
        echo "<div class='alert alert-success'>An email has been sent to $newemail. Please click on the link to prove you own that email address.</div>";
    }
    
?>