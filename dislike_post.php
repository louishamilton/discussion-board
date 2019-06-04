<?php

    //Add dislike to database with given username and postID.

    session_start();

    $hn = 'pluto.cse.msstate.edu';
    $un = 'cse3321g7';
    $pw = 'JwuN9SBB6KKILz8L';
    $db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }

    $query = "INSERT INTO PostLikes (postID, username, likeordislike)
        VALUES ('" . $_REQUEST['postID'] . "','" . $_SESSION["username"] . "','-1')";
        echo $query;
        $result = $con->query($query);
        if (!$result)
            die($con->error);
    echo "hi";
?>
