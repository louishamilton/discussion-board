<?php

    //This changes a user's password.

    $salt1    = "qm&h*ee";
    $salt2    = "pg!@z";

    $hn = 'pluto.cse.msstate.edu';
	$un = 'cse3321g7';
	$pw = 'JwuN9SBB6KKILz8L';
	$db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }

    $username = $_REQUEST['user'];
    $password = $_REQUEST['pass'];

    $securePassword = hash('ripemd128', "$salt1$password$salt2");

    $query = "UPDATE Users SET Users.password = '" . $securePassword . "' WHERE Username= '" . $username . "'";
    $result = mysqli_query($con, $query);
    echo $result;

?>
