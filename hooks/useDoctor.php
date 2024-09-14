<?php

//session_start();



function getDoctorBySpecialization($speciality, $connection){
    
    $speciality = str_replace('_', ' ', $speciality);
    
    $sql = "SELECT * FROM cms.Doctors WHERE doctorSpecialist = '$speciality'";

    $query = mysqli_query($connection, $sql);

    
    $doctors = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $doctors[] = $row;
    }

    return $doctors;

}

function getDoctorByUserName($username, $connection){
    $sql = "SELECT * FROM cms.Doctors WHERE dUserName = '$username'";

    $query = mysqli_query($connection, $sql);

    $row=mysqli_fetch_assoc($query);

    return $row;
}


?>