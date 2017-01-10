<?php
    session_start();
    include('connection.php');
    
    // Get the user ID
    $user_id = $_SESSION['user_id'];
    
    // Run a db query to empty notes
    $sql = "DELETE FROM notes WHERE note=''";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">An error has occured</div>';
        exit;
    }
    
    // Run a db query to look for notes corresponding to user_id
    $sql = "SELECT * FROM notes WHERE user_id ='$user_id' ORDER BY time DESC";
    
    // Shows notes or alert message
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result, MYSQL_ASSOC)){
                $note_id = $row['id'];
                $note = $row['note'];
                $time = $row['time'];
                $time = date("F d, Y h:i:s A", $time);
                echo "
                    <div>
                    </div>
                ";
            }
        } else {
            
        }
    } else {
        
    }
?>