<?php

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_database = "cms";

$connection = mysqli_connect($db_server, $db_user, $db_password, $db_database);

// if($connection)
//     echo 'Connected successfully';
// else
//     echo 'Connection failed '.mysqli_connect_error();

//mysqli_close($connection);

?>