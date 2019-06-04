<?php

    //This echos yes if user has admin privileges, no if not.

    session_start();

    if(isset($_SESSION['username']) && $_SESSION['type'] == "admin"){
        if($_SESSION['type'] == "admin"){
            echo "yes";
        }
    }
    else{
        echo "no";
    }
?>
