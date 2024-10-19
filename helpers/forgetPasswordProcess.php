<?php
session_start();
var_dump($_POST);

if(isset($_POST["submit"])){
    // Imports
    include('../config/db.php');
    include('../hooks/useParams.php');

    // Role constants 
    define('ADMIN', 'Admin');
    define('PATIENT', 'Patient');
    define('DOCTOR', 'Doctor');

    // Set the values from the form
    $email = $_POST["email"];
    $role = $_POST["role"] ?? ''; // Default to empty if not set

    // URLs
    $success_url = getBaseURL().'/pages/forgetPassword/securityQuestion.php'; // Redirect on securityQuestion page
    $error_url = getBaseURL().'/pages/forgetPassword/forgetPassword.php'; // Redirect on forget password page

    // Sanitize input
    $tb_email = mysqli_real_escape_string($connection, strip_tags($email));
    $tb_password = $_POST['password']; // Plain text password from form

    // Check the role
    if($role === PATIENT) {
        // Query database for patient
        $sql = "SELECT * FROM patients WHERE email='$tb_email'";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header('Location: ' . $success_url . '?user='. $row['pUserName'] .'&role='.$role.'&questionId='.$row['questionId']);
            exit();
        } else {
            header('Location: ' . $error_url . '?error=usernotfound');
            exit();
        }
    } elseif($role === DOCTOR) {
        // Query database for doctor
        $sql = "SELECT * FROM doctors WHERE doctorEmail='$tb_email'";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header('Location: ' . $success_url . '?user='. $row['dUserName'] .'&role='.$role.'&questionId='.$row['questionId']);
            exit();
        } else {
            header('Location: ' . $error_url . '?error=usernotfound');
            exit();
        }
    } elseif($role === ADMIN) {
        // Query database for admin
        $sql = "SELECT * FROM admins WHERE email='$tb_email'";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header('Location: ' . $success_url . '?user='. $row['aUserName'] .'&role='.$role.'&questionId='.$row['questionId']);
            exit();
        } else {
            header('Location: ' . $error_url . '?error=usernotfound');
            exit();
        }
    } else {
        // Handle missing role
        header('Location: '.$error_url.'?error=rolemissing');
        exit();
    }
} 
?>
