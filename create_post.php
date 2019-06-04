<?php

    //Add post to database.

    session_start();

    if(isset($_SESSION['username']))
    {
        $hn = 'pluto.cse.msstate.edu';
        $un = 'cse3321g7';
        $pw = 'JwuN9SBB6KKILz8L';
        $db = 'cse3321g7';
        $con = new mysqli($hn, $un, $pw, $db);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySql: " . mysqli_connect_error();
        }

        $query = "SELECT U.UserID FROM Users U WHERE U.Username= '" . $_SESSION["username"] . "'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $userID = $row[0];
        }
        echo $userID;

        $query = "INSERT INTO Posts (authorID, postDate, content, childID, title)
        VALUES ($userID,'" . date("Y-m-d h:i:s") . "','" . mysql_real_escape_string($_REQUEST['content']) . "','0','" . mysql_real_escape_string($_REQUEST['title']) . "')";
        echo $query;
        $result = $con->query($query);
        if (!$result)
            die($con->error);
    }
    else{echo "invalid";}
?>
