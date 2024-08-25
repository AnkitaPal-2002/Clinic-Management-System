<?php

//session_start();



function getPdetailsfromPUserName($pUserName){
    include("../config/db.php");

    $sql = "select * from patients where pUserName = '$pUserName'";
    $query = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($query);

    return $row;

}


?>