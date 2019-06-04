<?php

    //Get posts from database in order of most recent.

    $timezone = $_REQUEST['timezone'];
    $timezoneName = timezone_name_from_abbr("", $timezone*60, false);

    $hn = 'pluto.cse.msstate.edu';
    $un = 'cse3321g7';
    $pw = 'JwuN9SBB6KKILz8L';
    $db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }
    $posts_arr = array();
    $query = "SELECT title, postDate, postID, authorID, content FROM Posts ORDER BY postDate DESC";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
        $dateTime = date_create($row[1]);
        $dateTime = $dateTime->setTimezone(new DateTimeZone($timezoneName));
        $dateTime = date_format($dateTime, 'g:ia \o\n l jS F Y');
        $arr = array($row[0], $dateTime, $row[2]);

        $query2 = "SELECT U.Username FROM Users U WHERE U.UserID= '" . $row[3] . "'";
        $result2 = mysqli_query($con, $query2);
        while($row_user = mysqli_fetch_array($result2, MYSQLI_BOTH)){
            array_push($arr, $row_user[0], $row[4]);
        }
        array_push($posts_arr, json_encode($arr));
    }
    echo json_encode($posts_arr);
?>
