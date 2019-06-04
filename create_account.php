<?php

    //Creates account if username and email are unique, echos error code if not.

    if(isset($_REQUEST['fname']))
    {
        $salt1    = "qm&h*ee";
        $salt2    = "pg!@z";
        $password = $_REQUEST['pass'];
        $securePassword = hash('ripemd128', "$salt1$password$salt2");
        $hn = 'pluto.cse.msstate.edu';
        $un = 'cse3321g7';
        $pw = 'JwuN9SBB6KKILz8L';
        $db = 'cse3321g7';
        $con = new mysqli($hn, $un, $pw, $db);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySql: " . mysqli_connect_error();
        }

        $error_arr = array("","");

        $insert = True;
        $query = "SELECT U.Username FROM Users U WHERE U.Username = '" . mysql_real_escape_string($_REQUEST['user']) . "'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $error_arr[0] = "username";
            $insert = False;
        }

        $query = "SELECT U.Username FROM Users U WHERE U.Email = '" . mysql_real_escape_string($_REQUEST['email']) . "'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $error_arr[1] = "email";
            $insert = False;
        }
        echo json_encode($error_arr);

        if ($insert){
            $query = "INSERT INTO Users (Email, firstName, lastName, password, status, type, Username)
            VALUES ('" . mysql_real_escape_string($_REQUEST['email']) . "','" . mysql_real_escape_string($_REQUEST['fname']) . "','" . mysql_real_escape_string($_REQUEST['lname']) . "','" . strval($securePassword) . "','good','user','" . mysql_real_escape_string($_REQUEST['user']) . "')";
            $result = $con->query($query);
            if (!$result)
                die($con->error);
        }
    }
?>
