<?php  

    $sname = "localhost";
    $user = "root";
    $pass = "";

    $db_name = "login_db";

    $con = mysqli_connect($sname, $user, $pass, $db_name);

    if(!$con){
        echo "connection failed!";
    }

?>