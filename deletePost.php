<?php

    //Deletes post and post's comments from database with given postID.

    $hn = 'pluto.cse.msstate.edu';
	$un = 'cse3321g7';
	$pw = 'JwuN9SBB6KKILz8L';
	$db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }

    $postWanted = $_REQUEST['postID'];

    $query = "DELETE FROM Posts WHERE PostID= '" . $postWanted . "'";
    $result = mysqli_query($con, $query);

    $query = "DELETE FROM Comments WHERE PostID= '" . $postWanted . "'";
    $result = mysqli_query($con, $query);
    echo $result;
?>
