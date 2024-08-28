<?php
include("../hooks/usePatientUserName.php");
include("../hooks/useParams.php");
session_start();


$user = getPdetailsfromPUserName($_SESSION["pUserName"]);
$logoutURL = getBaseURL()."/pages/logout.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Global Hospital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <?php
        include('../components/navigation.php');
    ?>

    <main class="container max-w-6xl mx-auto p-4">
        <h2 class="text-2xl font-semibold text-start my-6"><?php echo 'Welcome '.$user['firstName'].' '.$user['lastName']?></h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <div class="text-purple-600 m-5">
                    <i class="fa-regular fa-calendar-check fa-2xl fa-bounce"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Book My Appointment</h3>
                <button class="bg-purple-600 text-white px-4 py-2 rounded mt-2 hover:bg-purple-700 transition duration-300">Book Appointment</button>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <div class="text-purple-600 m-5">
                    <i class="fa-solid fa-list-ul fa-shake fa-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">My Appointments</h3>
                <button class="bg-purple-600 text-white px-4 py-2 rounded mt-2 hover:bg-purple-700 transition duration-300">View Appointment History</button>
            </div>
        </div>
    </main>

</body>
</html>