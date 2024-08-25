<?php
include("../hooks/useParams.php");

session_start();


session_destroy();
$loginURL = getBaseURL()."/pages/login.php";

header("Location: $loginURL?success=true");
exit();

?>