<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'predictor';
    $connect = mysqli_connect($host,$user,$password,$database)
        or
    die("could not connect to database");
    mysqli_select_db($connect, "players");
?>