<!--This file receives the user_id and key generated to create the new password-->
<!--This file displays a form to input new password-->

<?php
    session_start();
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Password Reset</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            h1 {
                color: purple;
            }
            .contactForm {
                border: 1px solid #7c73f6;
                margin-top: 50px;
                border-radius: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10 contactForm">
                    <h1>Reset Password</h1>
                    <div id="resultmessage"></div>
                    <?php
                        // If user_id or key is missing
                        if(!isset($_POST['user_id']) || !isset($_POST['key'])){
                            echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email.</div>';
                            exit;
                        }
                        
                        // Else, store user_id or key in variables
                        $user_id = $_GET['user_id'];
                        $key = $_GET['key'];
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
                        
                        // Print reset password form with hidden user_id and key fields
                        echo "
                            <form method=post id='passwordreset'>
                                
                            </form>
                        ";
                    ?>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>