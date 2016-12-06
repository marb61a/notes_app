<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        
        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="styling.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>  
        
    </head>
    <body>
        <!-- Navigation bar -->
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
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li class="active"><a href="#">My Notes</a></li>
                    </ul>   
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Logged in as <b><?php echo $_SESSION['username']?></b></a>
                        </li>
                        <li>
                            <a href="index.php?logout=1">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <p>
                    Copyright &copy; 2015-<?php $today = date("Y"); echo $today?>
                </p>
            </div>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="mynotes.js"></script>         
    </body>
</html>