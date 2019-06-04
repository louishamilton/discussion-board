<?php

    //Logs user in if username and password match and user is not banned. Else send back error message.

    session_start();

    $correct = false;
    $salt1    = "qm&h*ee";
    $salt2    = "pg!@z";

    $username = "";
    $password = "";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $hn = 'pluto.cse.msstate.edu';
	$un = 'cse3321g7';
	$pw = 'JwuN9SBB6KKILz8L';
	$db = 'cse3321g7';
    $con = mysqli_connect($hn, $un, $pw, $db);

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySql: " . mysqli_connect_error();
    }

    $query = "SELECT DISTINCT Username, password, type, status FROM Users";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
        if (hash('ripemd128', "$salt1$password$salt2") == $row[1]){
            if ($row[0] == $username){
                if ($row[3] == "banned"){
                    echo "banned";
                }
                else{
                    echo "success";
                    $_SESSION["username"] = $row[0];
                    $_SESSION["userloggedin"] = true;
                    $_SESSION["type"] = $row[2];
                    $correct = true;
                }
            }
        }
    }

    if ($correct == false){
        session_destroy();
    }

?>

