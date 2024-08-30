<?php
session_start();
include("../config/db.php");
include("../hooks/useParams.php");
//include("../hooks/useParams.php");

// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST["submit"])){
    //var_dump($_POST);
    $aUserName = $_SESSION["aUserName"];
    $adminPassword = $_POST["adminPassword"];
    $url = getHostURL()."/auth/admin/doctorList.php";

    $sql = "SELECT * FROM admins WHERE aUserName='$aUserName'";
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password_hash = $row['password'];

        if(password_verify($adminPassword, $stored_password_hash)) {
            //var_dump($_POST);
            // Escape strings
            $dUserName = mysqli_real_escape_string($connection, $_POST['dUserName']);
            $doctorName = mysqli_real_escape_string($connection, $_POST['doctorName']);
            $doctorSpecialist = mysqli_real_escape_string($connection, $_POST['doctorSpecialist']);
            $doctorContacts = mysqli_real_escape_string($connection, $_POST['doctorContacts']);
            $doctorFess = mysqli_real_escape_string($connection, $_POST['doctorFess']);
            $doctorExperience = mysqli_real_escape_string($connection, $_POST['doctorExperience']);
            $doctorDescription = mysqli_real_escape_string($connection, $_POST['doctorDescription']);
            $doctorEmail = mysqli_real_escape_string($connection, $_POST['doctorEmail']);

            // Update query
            $update_sql = "UPDATE doctors SET 
                doctorName='$doctorName', 
                doctorSpecialist='$doctorSpecialist', 
                doctorContacts='$doctorContacts', 
                doctorFess='$doctorFess', 
                doctorExperience='$doctorExperience', 
                doctorDescription='$doctorDescription', 
                doctorEmail='$doctorEmail'
                WHERE dUserName='$dUserName'";

            if (mysqli_query($connection, $update_sql)) {
                header("Location: $url?status=success");
                exit();
            } else {
                header("Location: editDoctorProcess.php?error=dberror");
                exit();
            }




        }else{
           // $_SESSION['error'] = 'adminPasswordwrong';
            header('Location : editDoctorProcess.php');
            echo "error";
        }
    }





}


?>