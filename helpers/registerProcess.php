<?php

session_start();
include('../hooks/useParams.php');

if(isset($_POST['submit'])){
    include('../config/db.php');
    var_dump($_POST);

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    //$confirm_password = $_POST['confirm_password'];

    //Check wheather the username exists
    $tb_userName = mysqli_real_escape_string($connection, strip_tags($_POST['username']));
    $query = "select pUserName from patients where pUserName = '$tb_userName'";
    $res = mysqli_query($connection, $query);

    // Urls
    $success_url = getBaseURL().'/pages/login.php';
    $error_url = getBaseURL().'/pages/register.php';
    
    if(mysqli_num_rows($res)>0){

        header("Location: $error_url?error=usernamefail");
        exit;    
    }


    
    $tb_email = mysqli_real_escape_string($connection, strip_tags($_POST['email']));
    $query = "select email from patients where email = '$tb_email'";
    $res = mysqli_query($connection, $query);

    if(mysqli_num_rows($res)>0){
        header("Location: $error_url?error=emailfail");
        exit;    
    }

    $tb_password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);


    $tb_firstName = mysqli_real_escape_string($connection, strip_tags($_POST['firstName']));
    $tb_lastName = mysqli_real_escape_string($connection, strip_tags($_POST['lastName']));
    $tb_gender = mysqli_real_escape_string($connection, strip_tags($_POST['gender']));
    $tb_age = mysqli_real_escape_string($connection, strip_tags($age));
    $tb_contact = mysqli_real_escape_string($connection, strip_tags($contact));
    
    echo $contact;

    $sql = "insert into patients (pUserName, firstName, lastName, gender, age, email, contact, password) values ('$username', '$tb_firstName', '$tb_lastName', '$tb_gender', '$tb_age', '$tb_email', '$tb_contact', '$tb_password')";

    $res = mysqli_query($connection, $sql);

   

    if($res){
        header("Location: $success_url");
        exit;
    } else {
        header("Location: $error_url?error=wrong");
        exit; 
    }

}



?>