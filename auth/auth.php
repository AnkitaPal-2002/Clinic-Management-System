<?php

function checkAccess($requiredRole, $HostURL) {
    session_start();

    $URL = $HostURL."/pages/login.php?error=accessdenied";

    // Check if the user is logged in and matches the required role
    if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true || $_SESSION['userRole'] !== $requiredRole) {
        header("Location: $URL");
        exit();
    }
}
?>
