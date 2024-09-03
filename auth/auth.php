<?php

function checkAccess($requiredRole) {
    include ('../hooks/useParams.php');
    session_start();

    $URL = getHostURL()."/pages/login.php?error=accessdenied";

    // Check if the user is logged in and matches the required role
    if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true || $_SESSION['userRole'] !== $requiredRole) {
        header("Location: $URL");
        exit();
    }
}
?>
