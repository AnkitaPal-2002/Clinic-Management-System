<?php
session_start();

if (isset($_POST["submit"])) {
    // Imports
    include('../config/db.php');
    include('../hooks/useParams.php');
    $user = $_GET['user'];
    $role = $_GET['role'];

    // Role constants 
    define('ADMIN', 'Admin');
    define('PATIENT', 'Patient');
    define('DOCTOR', 'Doctor');

    // Set the values from the form
    $securityAnswer = $_POST["securityAnswer"];

    // URLs
    $success_url = getBaseURL() . '/pages/forgetPassword/newPassword.php'; // Redirect on successful login
    $error_url = getBaseURL() . '/pages/forgetPassword/forgetPassword.php'; // Redirect on error

    // Sanitize input
    $tb_user = mysqli_real_escape_string($connection, strip_tags($user));
    $tb_securityAnswer = mysqli_real_escape_string($connection, strip_tags($securityAnswer));

    // Check the role
    if ($role === PATIENT) {
        // Query database for patient
        $sql = "SELECT * FROM patients WHERE pUserName='$tb_user' and securityAnswer= '$tb_securityAnswer'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header('Location: ' . $success_url . '?user='. $row['pUserName'] .'&role='.$role);
        } else {
            header('Location: ' . $error_url . '?error=usernotfound');
            exit();
        }
    } elseif ($role === DOCTOR) {
        // Query database for doctor
        $sql = "SELECT * FROM doctors WHERE dUserName='$tb_user' and securityAnswer= '$tb_securityAnswer'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header('Location: ' . $success_url . '?user='. $row['dUserName'] .'&role='.$role);
        } else {
            header('Location: ' . $error_url . '?error=usernotfound');
            exit();
        }
    } elseif ($role === ADMIN) {
        // Query database for admin
        $sql = "SELECT * FROM admins WHERE aUserName='$tb_user' and securityAnswer= '$tb_securityAnswer'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header('Location: ' . $success_url . '?user='. $row['aUserName'] .'&role='.$role);
        } else {
            header('Location: ' . $error_url . '?error=usernotfound');
            exit();
        }
    } else {
        // Handle missing role
        header('Location: ' . $error_url . '?error=rolemissing');
        exit();
    }
}
