<?php

    //Calculates popularity and relevancy for all posts. Popularity is likes minus dislikes. Relevancy is popularity
    //adjusted for time since post was originally posted. Time penalty adjustment increases directly proportional to
    //the square root of time since posting.

    $hn = 'pluto.cse.msstate.edu';
    $un = 'cse3321g7';
    $pw = 'JwuN9SBB6KKILz8L';
    $db = 'cse3321g7';
    $con = new mysqli($hn, $un, $pw, $db);

    $query = "UPDATE Posts
    SET Posts.popularity =
        (
    SELECT
        SUM(PostLikes.likeordislike)
    FROM PostLikes
        WHERE
         PostLikes.postID=Posts.postID
    )";

    $result = mysqli_query($con, $query);

    $query = "UPDATE Posts
    SET Posts.popularity = 0
    WHERE Posts.popularity IS NULL";

    $result = mysqli_query($con, $query);

    $query = "UPDATE Posts SET Posts.score = (popularity*-1000 + SQRT(CURRENT_TIMESTAMP - postDate - 70000))";
    $result = mysqli_query($con, $query);
?>
