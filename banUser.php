<?php

    //This bans a user, which keeps them from logging in.

    $hn = 'pluto.cse.msstate.edu';
	$un = 'cse3321g7';
	$pw = 'JwuN9SBB6KKILz8L';
	$db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }

    $username = $_REQUEST['username'];
    $banned = "banned";

    $query = "UPDATE Users SET Users.status = '" . $banned . "' WHERE Username= '" . $username . "'";
    $result = mysqli_query($con, $query);
    echo $result;

?>
