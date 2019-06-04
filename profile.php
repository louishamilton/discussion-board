<?php

    //Gets user's profile information from database.

    session_start();

    if(isset($_SESSION['username'])){
        $hn = 'pluto.cse.msstate.edu';
        $un = 'cse3321g7';
        $pw = 'JwuN9SBB6KKILz8L';
        $db = 'cse3321g7';
        $con = mysqli_connect($hn, $un, $pw, $db);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySql: " . mysqli_connect_error();
        }

        $arr = array();

        $query = "SELECT * FROM Users WHERE Username = '" . mysql_real_escape_string($_SESSION["username"]) . "'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            array_push($arr, "<p><b>Email</b>: " . $row[1] . "</p>");
            array_push($arr, "<p><b>First Name:</b> " . $row[2] . "</p>");
            array_push($arr, "<p><b>Last Name:</b> " . $row[3] . "</p>");
            array_push($arr, "<p><b>Account Type:</b> " . $row[6] . "</p>");
            array_push($arr, "<p><b>Username:</b> " . $row[7] . "</p>");
        }
        echo json_encode($arr);
    }
    else{
        echo "loggedOut";
    }
?>
