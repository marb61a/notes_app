<?php 
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location : index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Notes</title>
        <!--CSS-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="styling.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
        <style type="text/css">
            #container {
                margin-top: 120px;
            }   
            
            #notePad, #allNotes, #done, .delete{
                display: none;   
            }
            
            .buttons {
                margin-bottom: 20px;
            }
            
            textarea {
                width: 100%;
                max-width: 100%;
                font-size: 16px;
                line-height: 1.5em;
                border-left-width: 20px;
                border-color: #CA3DD9;
                color: #CA3DD9;
                background-color: #FBEFFF;
                padding: 10px;
            }
            
            .noteheader {
                border: 1px solid grey;
                border-radius: 10px;
                margin-bottom: 10px;
                cursor: pointer;
                padding: 0 10px;
                background: linear-gradient(#FFFFFF,#ECEAE7);
            }
            
            .text {
                font-size: 20px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
            
            .timetext{
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        </style>
    </head>
    <body>
        <!-- Navigation bar -->
        <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <div class="navar-header">
                    
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