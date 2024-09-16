<?php 
session_start();
include ("../config/db.php");
include ("../hooks/useParams.php");

$appointmentId=$_GET['appointmentId'];

$urlForDoctor = getHostURL() ."/auth/doctorDashboard.php";
$urlForPatient = getHostURL() ."/auth/patient/doctorsAppointment/appointmentHistory.php";

if ($_SESSION['isLoggedIn'] === true) {
    
    // Check if the user role is 'Patient'
    if ($_SESSION['userRole'] == "Patient") {
        
        // Escape pUserName to prevent SQL injection
        $pUserName = mysqli_real_escape_string($connection, $_SESSION['pUserName']);

        // SQL query to update the appointment status for the patient
        $sql = "UPDATE appointments SET appointmentStatus = -1 WHERE pUserName = '$pUserName' and appointmentId = '$appointmentId'";

        // Execute the query
        $query = mysqli_query($connection, $sql);

        if ($query) {
            // Redirect to doctor dashboard with success message
            header("Location: $urlForPatient?success=true&message=Appointment status cancel successfully.");
            exit();
        } else {
            $errorMsg = mysqli_error($connection);
            header("Location: $urlForPatient?error=true&message=Error updating appointment status: $errorMsg ");
            exit();
        }

    } elseif ($_SESSION['userRole'] == "Doctor") {
        
        // Escape dUserName to prevent SQL injection
        $dUserName = mysqli_real_escape_string($connection, $_SESSION['dUserName']);

        $sql = "UPDATE appointments SET appointmentStatus = 1 WHERE dUserName = '$dUserName' and appointmentId = '$appointmentId'";

        $query = mysqli_query($connection, $sql);

        if ($query) {
            // Redirect to doctor dashboard with success message
            header("Location: $urlForDoctor?success=true&message=Appointment status cancel successfully.");
            exit();
        } else {
            $errorMsg = mysqli_error($connection);
            header("Location: $urlForDoctor?error=true&message=Error updating appointment status: $errorMsg ");
            exit();
        }
    }

} else {
    echo "User is not logged in.";
}
?>
