<?php 

function getAppointmentDetailsByUsername($username, $connection) {

    $sql = "SELECT d.doctorName, a.appointmentReason, a.appointmentDate, a.appointmentTime, a.appointmentStatus FROM cms.Doctors d JOIN cms.Appointments a ON d.dUserName = a.dUserName WHERE a.pUserName = '$username'";

    $query = mysqli_query($connection, $sql);

    $appointments = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $appointments[] = $row;
    }

    return $appointments;
}


?>