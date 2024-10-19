<?php

session_start();
include('../hooks/useParams.php');

if (isset($_POST['submit'])) {
    include('../config/db.php');
    var_dump($_POST);

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $securityQuestionsId = $_POST['securityQuestion']; // Fixed the index name
    $securityAnswer = $_POST['securityAnswer'];

    // Check whether the username exists
    $tb_userName = mysqli_real_escape_string($connection, strip_tags($username));
    $query = "SELECT pUserName FROM patients WHERE pUserName = '$tb_userName'";
    $res = mysqli_query($connection, $query);

    // Urls
    $success_url = getBaseURL() . '/pages/login.php';
    $error_url = getBaseURL() . '/pages/register.php';

    if (mysqli_num_rows($res) > 0) {
        header("Location: $error_url?error=usernamefail");
        exit;
    }

    $tb_email = mysqli_real_escape_string($connection, strip_tags($email));
    $query = "SELECT email FROM patients WHERE email = '$tb_email'";
    $res = mysqli_query($connection, $query);

    if (mysqli_num_rows($res) > 0) {
        header("Location: $error_url?error=emailfail");
        exit;
    }

    $tb_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);

    $tb_firstName = mysqli_real_escape_string($connection, strip_tags($firstName));
    $tb_lastName = mysqli_real_escape_string($connection, strip_tags($lastName));
    $tb_gender = mysqli_real_escape_string($connection, strip_tags($gender));
    $tb_age = mysqli_real_escape_string($connection, strip_tags($age));
    $tb_contact = mysqli_real_escape_string($connection, strip_tags($contact));
    $tb_securityAnswer = mysqli_real_escape_string($connection, strip_tags($securityAnswer));

    // Debugging output
    var_dump($securityQuestionsId); // Check the selected question ID

    // Ensure the securityQuestionsId exists in the securityquestions table
    $securityCheckQuery = "SELECT * FROM cms.SecurityQuestions WHERE questionId = '$securityQuestionsId'";
    $securityCheckResult = mysqli_query($connection, $securityCheckQuery);

    if (mysqli_num_rows($securityCheckResult) == 0) {
        header("Location: $error_url?error=invalidquestion");
        exit;
    }

    $sql = "INSERT INTO patients (pUserName, firstName, lastName, gender, age, email, contact, password, questionId, securityAnswer) VALUES ('$username', '$tb_firstName', '$tb_lastName', '$tb_gender', '$tb_age', '$tb_email', '$tb_contact', '$tb_password', '$securityQuestionsId', '$tb_securityAnswer')";

    $res = mysqli_query($connection, $sql);

    if ($res) {
        header("Location: $success_url");
        exit;
    } else {
        header("Location: $error_url?error=wrong");
        exit;
    }
}
