<?php
session_start();
var_dump($_POST);

if(isset($_POST["submit"])){
    // Imports
    include('../config/db.php');
    include('../hooks/useParams.php');

    // user by get request
    $user = $_GET["user"];

    // Role constants 
    define('ADMIN', 'Admin');
    define('PATIENT', 'Patient');
    define('DOCTOR', 'Doctor');

    // Set the values from the form
    $password = $_POST["password"];
    $role = $_POST["role"] ?? ''; // Default to empty if not set

    // URLs
    $success_url = getBaseURL().'/pages/login.php'; // Redirect on login page
    $error_url = getBaseURL().'/pages/forgetPassword/forgetPassword.php'; // Redirect on forget password page

    // Sanitize input
    $tb_user = mysqli_real_escape_string($connection, strip_tags($user));
    $tb_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);


    // Check the role
    if($role === PATIENT) {
        // Query database for patient
        $sql = "SELECT * FROM patients WHERE pUserName='$tb_user'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            // User exists, update the password
            $sql_update = "UPDATE patients SET password='$tb_password' WHERE pUserName='$tb_user'";
            $update_result = mysqli_query($connection, $sql_update);
    
            if ($update_result) {
                $row = mysqli_fetch_assoc($result);
                header('Location: ' . $success_url . '?status=password_updated');
                exit();
            } else {
                header('Location: ' . $error_url . '?error=updatefailed');
                exit();
            }
        } else {
            // User does not exist
            header('Location: ' . $error_url . '?error=usernotfound');
            exit();
        }
    } elseif($role === DOCTOR) {
        // Query database for doctor
        $sql = "SELECT * FROM doctors WHERE dUserName='$tb_user'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            // User exists, update the password
            $sql_update = "UPDATE doctors SET doctorPassword='$tb_password' WHERE dUserName='$tb_user'";
            $update_result = mysqli_query($connection, $sql_update);
    
            if ($update_result) {
                $row = mysqli_fetch_assoc($result);
                header('Location: ' . $success_url . '?status=password_updated');
                exit();
            } else {
                header('Location: ' . $error_url . '?error=updatefailed');
                exit();
            }
        } else {
            // User does not exist
            header('Location: ' . $error_url . '?error=usernotfound');
            exit();
        }
    } elseif($role === ADMIN) {
        // Query database for admin
        $sql = "SELECT * FROM admins WHERE aUserName='$tb_user'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            // User exists, update the password
            $sql_update = "UPDATE admins SET password='$tb_password' WHERE aUserName='$tb_user'";
            $update_result = mysqli_query($connection, $sql_update);
    
            if ($update_result) {
                $row = mysqli_fetch_assoc($result);
                header('Location: ' . $success_url . '?status=password_updated');
                exit();
            } else {
                header('Location: ' . $error_url . '?error=updatefailed');
                exit();
            }
        } else {
            // User does not exist
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
