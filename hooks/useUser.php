<?php
function getDoctor($connection, $dUserName){
    $sql = "select * from doctors where dUserName='$dUserName'";
    $query = mysqli_query($connection, $sql);

    $doctors = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $doctors[] = $row;
    }

    return $doctors;
}




?>