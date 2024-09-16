<?php 

function getAppointmentDetailsByPatientUsername($username, $connection) {

    $sql = "SELECT d.doctorName, a.appointmentId, a.appointmentReason, a.appointmentDate, a.appointmentTime, a.appointmentStatus FROM cms.Doctors d JOIN cms.Appointments a ON d.dUserName = a.dUserName WHERE a.pUserName = '$username'";

    $query = mysqli_query($connection, $sql);

    $appointments = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $appointments[] = $row;
    }

    return $appointments;
}


function getAppointmentDetailsByDoctorUsername($username, $connection) {

    $sql = "SELECT p.firstName, p.lastName, a.appointmentId, a.appointmentReason, a.appointmentDate, a.appointmentTime, a.appointmentStatus FROM cms.Patients p JOIN cms.Appointments a ON p.pUserName = a.pUserName WHERE a.dUserName = '$username'";

    $query = mysqli_query($connection, $sql);

    $appointments = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $appointments[] = $row;
    }

    return $appointments;
}

?>