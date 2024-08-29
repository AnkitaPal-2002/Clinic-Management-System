<?php

include("../config/db.php");
include("../hooks/useParams.php");

if(isset(($_POST['submit']))){
    $doctorName = mysqli_real_escape_string($connection, strip_tags($_POST['doctorName']));
    $dUserName = mysqli_real_escape_string($connection, strip_tags($_POST['dUserName']));
    $doctorSpecialist = mysqli_real_escape_string($connection, strip_tags($_POST['doctorSpecialist']));
    $doctorContacts = mysqli_real_escape_string($connection, strip_tags($_POST['doctorContacts']));
    $doctorFess = mysqli_real_escape_string($connection, strip_tags($_POST['doctorFess']));
    $doctorExperience = mysqli_real_escape_string($connection, strip_tags($_POST['doctorExperience']));
    $doctorDescription = mysqli_real_escape_string($connection, strip_tags($_POST['doctorDescription']));
    $doctorEmail = mysqli_real_escape_string($connection, strip_tags($_POST['doctorEmail']));
    
    $doctorPassword = password_hash($_POST['doctorPassword'], PASSWORD_DEFAULT , ['cost' => 10]);

    $url = getHostURL().'/auth/admin/addDoctor.php';


    $sql = "select * from doctors where dUserName = '$dUserName'";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0){
        header("Location: $error_url?error=userfail");
        exit();
    }

    $sql = "select * from doctors where doctorEmail = '$doctorEmail'";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0){
        header("Location: $url?error=emailfail");
        exit();
    }

    $insertQuery = "
    INSERT INTO doctors (doctorName, dUserName, doctorSpecialist, doctorContacts, doctorFess, doctorExperience, doctorDescription, doctorEmail, doctorPassword)
    VALUES ('$doctorName', '$dUserName', '$doctorSpecialist', '$doctorContacts', '$doctorFess', '$doctorExperience', '$doctorDescription', '$doctorEmail', '$doctorPassword')";

    $result = mysqli_query($connection, $insertQuery);
    if($result){
        header("Location: $url?success=true");
        exit();
    }else{
        header("Location: $url?error=wrong");
        exit();
    }
    
    


}





?>