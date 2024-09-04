<?php 
    include ('./auth.php');
    include('../../hooks/useParams.php');
    checkAccess('Admin', getHostURL());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Clinic Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .btn-transition {
            background-color: transparent; 
            color: white; 
            transition: background-color 0.3s ease, color 0.3s ease; 
        }
        
    </style>
</head>

<?php
    include('../../hooks/useUsers.php');
    include('../../config/db.php');
    include('../../components/dangeralert.php');

    $patients = getAllPatientDetails($connection);
    $patientCount = count($patients);
?>

<body class="min-h-screen bg-white">
    <!-- Header -->
    <?php 
        include('../../components/navigation.php');
    ?>

    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="bg-blue-800 md:bg-transparent text-black w-64 p-4 space-y-4 fixed inset-y-0 left-0 z-50 lg:relative transition-transform duration-300 ease-in-out transform -translate-x-full lg:translate-x-0">
            <button id="closeSidebarButton" class="absolute top-4 right-4 lg:hidden p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <nav class="space-y-2">
                <button
                    class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md gap-3">
                    <a href=<?php 
                        echo getHostURL()."/auth/adminDashboard.php"
                        ?>
                        class="flex items-center gap-2"
                    >
                        <i class="fa-solid fa-chart-line"></i>
                        Admin Dashboard
                        
                    </a>
                </button>
                <button
                    class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md gap-3">                    
                    <a href=<?php 
                        echo getHostURL()."/auth/admin/doctorList.php"
                    ?>
                    class="flex items-center gap-3"
                    >
                        <i class="fa-solid fa-user-doctor"></i>
                        Doctor List
                    </a>
                </button>
                <button
                    class="btn-transition flex items-center w-full p-2 text-left text-white bg-blue-600 rounded-md gap-2">
                    <i class="fa-solid fa-bed-pulse"></i>
                    Patient List
                </button>
                <button
                    class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md gap-3">
                    <i class="fa-solid fa-calendar-check "></i>
                    Appointment Details
                </button>
                <button
                    class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md gap-3">
                    <i class="fa-solid fa-calendar-check "></i>
                    Add Doctor
                </button>
                <a href=<?php 
                    echo getHostURL()."/pages/logout.php"
                    ?>
                >
                    <button
                        class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md gap-3">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        SignOut
                    </button>
            
                </a>

            </nav>
        </aside>

        <!-- Patient table Content -->
        <section class="max-w-6xl m-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Our patients (Total: <?php echo $patientCount; ?>)
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                            View all active patients in the system with complete details including names, status, and other relevant information.
                        </p>
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Patient name</th>
                            <th scope="col" class="px-6 py-3">Patient Username</th>
                            <th scope="col" class="px-6 py-3">Gender</th>
                            <th scope="col" class="px-6 py-3">Age</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the patients array to populate the table
                        if ($patientCount === 0) {
                            # code...
                            danger("No records found...");
                        }
                        foreach ($patients as $patient) {
                            echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
                            echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>{$patient['firstName']} {$patient['lastName']}</th>";
                            echo "<td class='px-6 py-4'>{$patient['pUserName']}</td>";
                            echo "<td class='px-6 py-4'>{$patient['gender']}</td>";
                            echo "<td class='px-6 py-4'>{$patient['age']}</td>";
                            echo "<td class='px-6 py-4'>{$patient['email']}</td>";
                            echo "<td class='px-6 py-4'>{$patient['contact']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>


    <script>
        const sidebar = document.getElementById("sidebar");
        const toggleSidebarButton = document.getElementById("toggleSidebarButton");
        const closeSidebarButton = document.getElementById("closeSidebarButton");

        toggleSidebarButton.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
        });

        closeSidebarButton.addEventListener("click", () => {
            sidebar.classList.add("-translate-x-full");
        });
    </script>
</body>

</html>