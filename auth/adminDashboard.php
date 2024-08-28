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
    include('../hooks/useParams.php');
 ?>
<body class="min-h-screen bg-white max-w-7xl mx-auto">
    <!-- Header -->
    <?php
        include('../components/navigation.php');
    ?>

    <div class="flex flex-col lg:flex-row">
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
                    class="btn-transition flex items-center w-full p-2 text-left text-white bg-blue-600 rounded-md gap-2">
                    <i class="fa-solid fa-chart-line"></i>
                    Admin Dashboard
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
                    class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md">
                    <a href=<?php 
                        echo getHostURL()."/auth/admin/patientList.php"
                        ?>
                        class="flex items-center gap-2"
                    >
                        <i class="fa-solid fa-bed-pulse"></i>
                        Patient List
                    </a>
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
                <button
                    class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md gap-3">
                    <i class="fa-solid fa-right-from-bracket"></i>
                      SignOut
                </button>

            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4">
            <h2 class="text-2xl font-bold text-black mb-6">WELCOME ADMIN</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-blue-600 ">

                <div
                    class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 hover:text-white duration-300">
                    <div class="mb-4">
                        <i class="fa-solid fa-user-doctor fa-fade fa-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Doctor List</h3>
                    <a href=<?php 
                        echo getHostURL()."/auth/admin/doctorList.php"
                    ?> 
                        class="hover:text-white hover:underline mt-auto"
                    >
                        View Doctors
                    </a>
                </div>

                <div
                    class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 hover:text-white duration-300">
                    <div class=" mb-4">
                        <i class="fa-solid fa-bed-pulse fa-fade fa-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Patient List</h3>
                    <a href=<?php 
                        echo getHostURL()."/auth/admin/patientList.php"
                        ?>
                        class="hover:text-white hover:underline mt-auto"
                    >
                            View Patients
                    </a>
                </div>

                <div
                    class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 hover:text-white duration-300">
                    <div class=" mb-4">
                        <i class="fa-solid fa-calendar-check fa-shake fa-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Appointment Details</h3>
                    <a href="#" class="hover:text-white hover:underline mt-auto">View Appointments</a>
                </div>

                <div
                    class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 hover:text-white duration-300">
                    <div class=" mb-4">
                        <i class="fa-solid fa-plus fa-beat fa-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Manage Doctors</h3>
                    <a href="#" class="hover:text-white hover:underline mt-auto">Add Doctors</a>
                </div>

            </div>
        </main>
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