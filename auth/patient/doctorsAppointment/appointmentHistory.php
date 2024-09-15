<?php 
    include '../../auth.php';
    include '../../../config/db.php';
    include '../../../hooks/useParams.php';
    include '../../../hooks/useDoctor.php';
    include '../../../hooks/useAppointment.php';
    include '../../../components/dangeralert.php';
    include '../../../components/successAlert.php';
    include '../../../helpers/bookAppointmentProcess.php';

    checkAccess('Patient', getHostURL());

    // Get the appointment details for the logged-in patient
    $appointments = getAppointmentDetailsByPatientUsername($_SESSION['pUserName'], $connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Appointment History</title>
</head>
<body class="bg-gray-100">
    <?php include ('../../../components/navigation.php'); ?>

    <main class="max-w-6xl mx-auto p-4">
        <h2 class="text-2xl font-bold mb-6 text-center">Appointment History</h2>
        <section class="block md:flex gap-3 m-2">

            <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                <h3 class="text-xl font-semibold m-2 p-2">Dashboard</h3>
                <nav>
                    <ul>
                        <li class="m-2 p-2">
                            <a href="<?php echo getHostURL()."/auth/patientDashboard.php"; ?>" class="text-purple-600 hover:underline">Dashboard</a>
                        </li>
                        <li class="m-2 p-2">
                            <a href="<?php echo getHostURL()."/auth/patient/departmentList.php"; ?>" class="text-purple-600 hover:underline">Book Appointment</a>
                        </li>
                        <li class="m-2 p-2 bg-purple-600 rounded-md">
                            <a href="#" class="text-white hover:underline">Appointment History</a>
                        </li>
                    </ul>
                </nav>
            </div>
                       
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 grow">
                <section class="max-w-4xl m-auto">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <caption
                            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Appointment History
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                View all your previous appointments with details such as doctor name, appointment reason, and schedule.
                            </p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Sl. No.</th>
                                <th scope="col" class="px-6 py-3">Doctor Name</th>
                                <th scope="col" class="px-6 py-3">Appointment Reason</th>
                                <th scope="col" class="px-6 py-3">Appointment Date</th>
                                <th scope="col" class="px-6 py-3">Appointment Time</th>
                                <th scope="col" class="px-6 py-3">Cancel Appointment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($appointments)) {
                                danger("No appointment history found...");
                            } else {
                                $i = 1;
                                foreach ($appointments as $appointment) {
                                    echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
                                    echo "<td class='px-6 py-4'>{$i}</td>";
                                    echo "<td class='px-6 py-4'>{$appointment['doctorName']}</td>";
                                    echo "<td class='px-6 py-4'>{$appointment['appointmentReason']}</td>";
                                    echo "<td class='px-6 py-4'>{$appointment['appointmentDate']}</td>";
                                    echo "<td class='px-6 py-4'>{$appointment['appointmentTime']}</td>";
                                    // $appointmentId = $appointment["appointmentId"];
                                    
                                    // Cancel appointment button
                                    echo "<td class='px-6 py-4'>
                                            <a href='cancelAppointment.php?appointmentId'>
                                                <button type='button' class='focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                                    Cancel
                                                </button>
                                            </a>
                                        </td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </section>
            </div>

        </section>
    </main>
</body>
</html>
