<?php
session_start();
include("../config/db.php");
include("../hooks/useParams.php");

// Check if admin is logged in
if (!isset($_SESSION["aUserName"])) {
    header("Location: /login.php?error=notloggedin");
    exit();
}

if (isset($_POST["submit"])) {
    $aUserName = $_SESSION["aUserName"];
    $adminPassword = $_POST["adminPassword"];
    $url = getHostURL() . "/auth/admin/doctorList.php";

    $sql = "SELECT * FROM admins WHERE aUserName='$aUserName'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password_hash = $row['password'];

        if (password_verify($adminPassword, $stored_password_hash)) {
            // Escape strings to prevent SQL injection
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
        } else {
            include("../components/navigation.php");
            include("../components/errorHandler.php");
            errorHandler("Admin Password is wrong", getHostURL()."/auth/admin/doctorList.php" );
        }
    } else {
        header("Location: /login.php?error=nouser");
        exit();
    }
} else {
    header("Location: /editDoctorForm.php?error=invalidaccess");
    exit();
}
?>
