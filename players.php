<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'predictor';
    $connect = mysqli_connect($host,$user,$password,$database)
        or
    die("could not connect to database");
    mysqli_select_db($connect, "players");

    $query = mysqli_query($connect, "SELECT username FROM players WHERE username='Ash' and password='123'");
    
while($row = mysqli_fetch_assoc($query))
{
    extract($row);
    echo $username;
}
?>
