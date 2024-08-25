<?php
session_start();

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
    $password = $_POST["password"];
    $role = $_POST["role"] ?? ''; // Default to empty if not set

    // URLs
    $success_url = getBaseURL().'/auth'; // Redirect on successful login
    $error_url = getBaseURL().'/pages/login.php'; // Redirect on error

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
            $stored_password_hash = $row['password'];

            if(password_verify($tb_password, $stored_password_hash)) {
                // Password is correct, proceed with login
                $_SESSION['pUserName'] = $row['pUserName']; // Assuming the column is puserName
                header('Location: ' . $success_url.'/patientDashboard.php');
                exit();
            } else {
                header('Location: ' . $error_url . '?error=invalidpassword');
                exit();
            }
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
            $stored_password_hash = $row['doctorPassword'];

            if(password_verify($tb_password, $stored_password_hash)) {
                // Password is correct, proceed with login
                $_SESSION['dUserName'] = $row['dUserName']; // Assuming the column is duserName
                header('Location: ' . $success_url.'/doctorDashboard.php');
                exit();
            } else {
                header('Location: ' . $error_url . '?error=invalidpassword');
                exit();
            }
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
            $stored_password_hash = $row['password'];

            if(password_verify($tb_password, $stored_password_hash)) {
                // Password is correct, proceed with login
                $_SESSION['aUserName'] = $row['aUserName']; // Assuming the column is auserName
                header('Location: ' . $success_url.'/adminDashboard.php');
                exit();
            } else {
                header('Location: ' . $error_url . '?error=invalidpassword');
                exit();
            }
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
