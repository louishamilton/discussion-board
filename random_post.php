<?php

    //Gets single, random postID from database.

    $hn = 'pluto.cse.msstate.edu';
    $un = 'cse3321g7';
    $pw = 'JwuN9SBB6KKILz8L';
    $db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }

    $query = "SELECT title, postDate, postID, authorID FROM Posts ORDER BY RAND() LIMIT 1;";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
        $url = "htmlpostpage.php?p=" . $row[2];
    }
    echo $url;
?>
