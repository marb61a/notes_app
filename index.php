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
        
        
    </body>
</html>