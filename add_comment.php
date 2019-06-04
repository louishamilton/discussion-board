<?php

    //Adds comment to post that the user is viewing.

    session_start();

    if(isset($_SESSION['username']))
    {

    $postWanted = $_REQUEST['postID'];
    $comment = $_REQUEST['comment'];

    $hn = 'pluto.cse.msstate.edu';
    $un = 'cse3321g7';
    $pw = 'JwuN9SBB6KKILz8L';
    $db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }

    $query = "SELECT U.UserID FROM Users U WHERE U.Username= '" . $_SESSION["username"] . "'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
        $userID = $row[0];
    }

    $query = "INSERT INTO Comments (PostID, ParentID, Content, userID, postDate)
    VALUES ('" . mysql_real_escape_string($_REQUEST['postID']) . "','0','" . mysql_real_escape_string($_REQUEST['comment']) . "',$userID,'" . date("Y-m-d h:i:s") . "')";
    echo $query;
    $result = $con->query($query);
    if (!$result)
        die($con->error);
    }
    else{echo "invalid";}
?>
