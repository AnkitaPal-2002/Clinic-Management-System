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
    <title>Global Hospital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-gradient-to-r from-purple-600 to-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">🏥 Global Hospital</h1>
            <button id="logoutBtn" class="text-sm bg-white text-purple-600 px-3 py-1 rounded">Logout</button>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold text-center my-6"><?php echo 'Welcome '.$user['firstName'].' '.$user['lastName']?></h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="text-xl font-semibold mb-2">Book My Appointment</h3>
                <button class="bg-purple-600 text-white px-4 py-2 rounded mt-2 hover:bg-purple-700 transition duration-300">Book Appointment</button>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="text-xl font-semibold mb-2">My Appointments</h3>
                <button class="bg-purple-600 text-white px-4 py-2 rounded mt-2 hover:bg-purple-700 transition duration-300">View Appointment History</button>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            // Add logout functionality here
            alert('Logout clicked');
        });
    </script>
</body>
</html>