<?php 
    include '../../auth.php';
    include '../../../config/db.php';
    include '../../../hooks/useParams.php';
    include '../../../hooks/useDoctor.php';

    checkAccess('Patient', getHostURL());

    $speciality = $_GET['cat'];
    
    $doctorRecords = getDoctorBySpecialization($speciality, $connection);

    $URL = getHostURL()."/auth/patient/doctorsAppointment/doctorsAppointment.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Doctor Specialist List</title>
</head>
<body>
    <?php include ('../../../components/navigation.php'); ?>
   
    <section class="max-w-6xl mx-auto">
        <h1 class="text-2xl my-4 font-bold underline cursor-default">List of all the <?php echo htmlspecialchars($speciality); ?></h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 p-4">
            <!-- Here display all the doctor list -->
    
            <?php
                if (!empty($doctorRecords)) {
                    foreach ($doctorRecords as $doctor) {
                        echo '<div class="p-4 border rounded-lg shadow-md">';
                        echo '<h2 class="text-xl font-bold">' . htmlspecialchars($doctor['doctorName']) . '</h2>';
                        echo '<p class="text-gray-600">' . htmlspecialchars($doctor['doctorDescription']) . '</p>';
                        echo '<p><strong>Experience:</strong> ' . htmlspecialchars($doctor['doctorExperience']) . ' years</p>';
                        echo '<p><strong>Fees:</strong> ' . htmlspecialchars($doctor['doctorFess']) . ' /-</p>';
                        echo '<p><strong>Contact:</strong> ' . htmlspecialchars($doctor['doctorContacts']) . '</p>';
                        echo '<p><strong>Email:</strong> ' . htmlspecialchars($doctor['doctorEmail']) . '</p>';
                        echo '<a href="' . htmlspecialchars($URL) . '?docUsername=' . urlencode($doctor['dUserName']) . '"
                                class="inline-flex items-center my-2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 gap-2">
                                Book Appointment
                                <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                            </a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-red-500">No doctors found for this specialization.</p>';
                }
            ?>
    
        </div>
    </section>

</body>
</html>
