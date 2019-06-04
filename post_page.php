<?php

    //Gets contents of post with given postID from database.

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

    $query = "SELECT content, title, postDate, authorID FROM Posts WHERE PostID = '" . mysql_real_escape_string($_REQUEST['postID']) . "'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0){
        echo $count;
    }
    else {
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $dateTime = date_create($row[2]);
            $dateTime = $dateTime->setTimezone(new DateTimeZone($timezoneName));
            $dateTime = date_format($dateTime, 'g:ia \o\n l jS F Y');
            $arr = array($row[0], $row[1], $dateTime);
            $authorID = $row[3];
        }

        $query = "SELECT U.Username FROM Users U WHERE U.UserID= '" . mysql_real_escape_string($authorID) . "'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            array_push($arr, $row[0]);
        }

        $comments_arr = array();
        $comment_arr = array();

        $query = "SELECT U.Username, C.content, C.ParentID, C.postDate, C.CommentID FROM Comments C JOIN Users U ON C.userID=U.UserID WHERE C.PostID= '" . mysql_real_escape_string($_REQUEST['postID']) . "'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $comment_arr = array();
            $dateTime2 = date_create($row[3]);
            $dateTime2 = $dateTime2->setTimezone(new DateTimeZone($timezoneName));
            $dateTime2 = date_format($dateTime2, 'g:ia \o\n l jS F Y');
            array_push($comment_arr, $row[0]);
            array_push($comment_arr, $row[1]);
            array_push($comment_arr, $dateTime2);
            array_push($comment_arr, $row[4]);
            array_push($comments_arr, json_encode($comment_arr));
        }
        array_push($arr, json_encode($comments_arr));
        array_push($arr, $postWanted);

        $query = "SELECT P.likeordislike FROM PostLikes P WHERE P.postID= '" . mysql_real_escape_string($_REQUEST['postID']) . "'";
        $result = mysqli_query($con, $query);
        $score = 0;
        $count = mysqli_num_rows($result);
        if ($count == 0){
            $score = 0;
        }
        else{
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                $score = $score + $row[0];
            }
        }
        array_push($arr, $score);
        echo json_encode($arr);
    }
?>
