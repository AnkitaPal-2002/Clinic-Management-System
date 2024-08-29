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
    include('../../components/successAlert.php');
    include('../../hooks/useParams.php');

    $doctors = getAllDoctorDetails($connection);
    $doctorCount = count($doctors);

    $url = getHostURL();
    $deleteDoctor = $url."/helpers/deleteDoctorProcess.php";
    $editDoctor = $url."/helpers/editDoctorProcess.php";


   
    
?>

<body class="min-h-screen bg-white">
    <!-- Header -->
    <?php 
        include('../../components/navigation.php');
        if(isset($_GET['error'])){
            if($_GET['error'] == 'wrong'){
                danger('Something wenr wrong !!!!');
            }
        }else if(isset($_GET['success'])){
            if($_GET['success'] == 'true'){
                success('Doctor details delete successfully.');
            }
        }
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
                    class="btn-transition flex items-center w-full p-2 text-left text-white bg-blue-600 rounded-md gap-3">
                    <i class="fa-solid fa-user-doctor"></i>
                    Doctor List
                </button>
                <button
                    class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md gap-3">
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
                    <a href=<?php 
                        echo getHostURL()."/auth/admin/addDoctor.php"
                    ?>
                        class="flex items-center gap-2"
                        >
                        <i class="fa-solid fa-calendar-check "></i>
                        Add Doctor
                    </a>
                </button>
                <button
                    class="btn-transition flex items-center w-full p-2 text-left text-white md:text-black hover:bg-blue-600 md:hover:text-white rounded-md gap-3">
                    <i class="fa-solid fa-right-from-bracket"></i>
                      SignOut
                </button>

            </nav>
        </aside>

        <!-- doctor table Content -->
        <section class="max-w-6xl m-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Our doctors (Total: <?php echo $doctorCount; ?>)
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                            View all active doctors in the system with complete details including names, status, and other relevant information.
                        </p>
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Sl. No.</th>
                            <th scope="col" class="px-6 py-3">doctor name</th>
                            <th scope="col" class="px-6 py-3">doctor Username</th>
                            <th scope="col" class="px-6 py-3">Specialist</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Fess</th>
                            <th scope="col" class="px-6 py-3">Experience</th>
                            <th scope="col" class="px-6 py-3">Phone Number</th>
                            <!-- <th scope="col" class="px-6 py-3">Description</th> -->
                            <th scope="col" class="px-6 py-3">Delete Doctor</th>
                            <th scope="col" class="px-6 py-3">Edit Doctor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the doctors array to populate the table
                        if ($doctorCount === 0) {
                            # code...
                            danger("No records found...");
                        }
                        $i = 1;
                        foreach ($doctors as $doctor) {
                            echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
                            echo "<td class='px-6 py-4'>{$i}</td>";
                            echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>{$doctor['doctorName']}</th>";
                            echo "<td class='px-6 py-4'>{$doctor['dUserName']}</td>";
                            echo "<td class='px-6 py-4'>{$doctor['doctorSpecialist']}</td>";
                            echo "<td class='px-6 py-4'>{$doctor['doctorEmail']}</td>";
                            echo "<td class='px-6 py-4'>{$doctor['doctorFess']}</td>";
                            echo "<td class='px-6 py-4'>{$doctor['doctorExperience']}</td>";
                            echo "<td class='px-6 py-4'>{$doctor['doctorContacts']}</td>";
                            $username = $doctor["dUserName"];
                            //echo "<td class='px-6 py-4'>{$doctor['doctorDescription']}</td>";
                            $i++;

                            //Delete button
                            echo "<td style='text-align: center;'>
                                    <a href='$deleteDoctor?username=$username'>
                                        <button type='button' class='focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                            <i class='fa-solid fa-trash-can fa-xl'></i>
                                        </button>
                                    </a>
                                </td>";
                            
                            //Edit button
                            echo "<td style='text-align: center;'>
                                    <a href='$editDoctor'>
                                        <button type='button' class='focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                                            <i class='fa-solid fa-user-pen fa-xl'></i>
                                        </button>
                                    </a>
                                </td>";

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