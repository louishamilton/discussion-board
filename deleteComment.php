<?php

    //Deletes comment from database with given CommentID.

    $hn = 'pluto.cse.msstate.edu';
	$un = 'cse3321g7';
	$pw = 'JwuN9SBB6KKILz8L';
	$db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }

    $commentWanted = $_REQUEST['commentID'];

    $query = "DELETE FROM Comments WHERE CommentID= '" . $commentWanted . "'";
    $result = mysqli_query($con, $query);
    echo $result;

?>
