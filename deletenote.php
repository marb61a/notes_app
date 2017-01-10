<?php
    session_start();
    include('connection.php');
    
    // Get note ID using AJAX
    $note_id = $_POST['id'];
    
    // Run a db query to delete note
    $sql = "DELETE FROM notes WHERE id = $note_id";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo 'error';   
    }
?>