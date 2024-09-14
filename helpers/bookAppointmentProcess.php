<?php 

function bookDoctorAppointment($doctorUsername, $patientUsername, $time, $date, $reason, $connection){

    // Prepare SQL query 
    //  appointment status 0=approved, 1= cancel by patient, -1= cancel by doctor
    $sql = "INSERT INTO appointments (dUserName, pUserName, appointmentTime, appointmentDate, appointmentReason, appointmentStatus)
    VALUES ('$doctorUsername', '$patientUsername', '$time', '$date', '$reason', 0)";

    $result = mysqli_query($connection, $sql);

    if($result){
        return true;
    }else{
       return false;
    }


}

?>