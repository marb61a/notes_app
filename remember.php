<?php 
    // If the user is not logged in & rememberme cookie exists
    if(!isset($_SESSION['user_id']) && !empty($_COOKIE['rememberme'])){
        //f1: COOKIE: $a . "," . bin2hex($b)
        //f2: hash('sha256', $a)
        
        // Extract $authentificators 1&2 from the cookie
        list($authentificator1, $authentificator2) = explode(',', $_COOKIE['rememberme']);
        $authentificator2 = hex2bin($authentificator2);
        $f2authentificator2 = hash('sha256', $authentificator2);
        
        // Look for $authentificator1 in the rememberme table
        $sql = "SELECT * FROM rememberme where authentificator1 = '$authentificator1'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo '<div class="alert alert-danger">There was an error running the query.</div>';
            exit;
        }
        $count = mysqli_num_rows($result);
        if($count !== 1){
            echo '<div class="alert alert-danger">Remember me process failed!</div>';
            exit;
        }
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        // If authentificator2 does not match
        if(hash_equals($row['f2authentificator2'], $f2authentificator2)){
            echo '<div class="alert alert-danger">hash_equals returned false.</div>';    
        } else {
            
        }
    }
?>