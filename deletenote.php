<?php
    session_start();
    include('connection.php');
    
    // Get note ID using AJAX
    $note_id = $_POST['id'];
    
?>