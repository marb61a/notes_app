<?php 
session_start();
include('connection.php');

//Logout
include('logout.php');

// Remember me
include('remember.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Notes App</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="styling.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!--Navigation Bar--> 
        <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Online Notes App</a>
                    <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!--Jumbotron with Sign up Button-->
        <div class="jumbotron" id="myContainer">
            <h1>Online Notes App</h1>
            <p>Your Notes with you wherever you go.</p>
            <p>Easy to use, protects all your notes!</p>
            <button type="button" class="btn btn-lg green signup" data-target="#signupModal" data-toggle="modal">
                Sign Up It's free
            </button>
        </div>
        
        
        <!--Login form-->
        <form method="post" id="loginform">
            <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">
                                &times;
                            </button>
                            <h4 id="myModalLabel">
                                Login: 
                            </h4>
                        </div>
                        <div class="modal-body">
                            <!--Login message from PHP file-->
                            <div id="loginmessage"></div>
                            <div class="form-group">
                                <label for="loginemail" class="sr-only">Email:</label>
                                <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="loginpassword" class="sr-only">Password</label>
                                <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
       
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="index.js"></script> 
    </body>
</html>