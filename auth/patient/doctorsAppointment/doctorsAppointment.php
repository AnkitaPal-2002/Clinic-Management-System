<?php 
    include '../../auth.php';
    include '../../../config/db.php';
    include '../../../hooks/useParams.php';
    include '../../../hooks/useDoctor.php';
    include '../../../components/dangeralert.php';
    include '../../../components/successAlert.php';
    include '../../../helpers/bookAppointmentProcess.php';

    checkAccess('Patient', getHostURL());

    $Params = $_GET['docUsername'];
    $doctor = getDoctorByUserName($Params, $connection);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission
        $date = $_POST['date'];
        $time = $_POST['time'];
        $reason = $_POST['applicationReason']; 
        
        // Ensure the date, time, and reason are not empty
        if (!empty($date) && !empty($time) && !empty($reason)) {
            if(bookDoctorAppointment($Params, $_SESSION['pUserName'], $time, $date, $reason, $connection)) {
                success('Appointment booked successfully. Thank you.');
            } else {
                danger('Appointment is not booked. Please try again.');
            }
            // header('Location: success.php'); 
            // exit();
        } else {
            $error = 'Please provide the date, time, and a reason for the appointment.';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php include ('../../../components/navigation.php') ?>

    <main class="max-w-6xl mx-auto p-4">
        <h2 class="text-2xl font-bold mb-6 text-center">Book Appointment with <?php echo htmlspecialchars($doctor['doctorName']); ?></h2>
        <section class="block md:flex gap-3 m-2">

            <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                <h3 class="text-xl font-semibold mb-4">Dashboard</h3>
                <nav>
                    <ul>
                        <li class="mb-2">
                            <a href="<?php echo getHostURL()."/auth/patientDashboard.php"; ?>" class="text-purple-600 hover:underline">Dashboard</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-purple-600 hover:underline">Book Appointment</a>
                        </li>
                        <li>
                            <a href="#" class="text-purple-600 hover:underline">Appointment History</a>
                        </li>
                    </ul>
                </nav>
            </div>
                       
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 grow">
                <h3 class="text-xl font-semibold mb-4">Create an Appointment</h3>
                <form method="POST">
                    <div class="mb-4">
                        <label for="doctorName" class="block text-sm font-medium text-gray-700 mb-1">Doctor:</label>
                        <input type="text" id="doctorName" value="<?php echo htmlspecialchars($doctor['doctorName']); ?>" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="fees" class="block text-sm font-medium text-gray-700 mb-1">Consultancy Fees</label>
                        <input type="text" id="fees" value="<?php echo htmlspecialchars($doctor['doctorFess']); ?>" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" id="date" name="date" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="time" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                        <input type="time" id="time" name="time" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="applicationReason" class="block text-sm font-medium text-gray-700 mb-1">Application Reason</label>
                        <textarea id="applicationReason" name="applicationReason" rows="4" class="w-full p-2 border rounded" placeholder="Reason for booking this appointment..." required></textarea>
                    </div>
                    <?php if (isset($error)) : ?>
                        <p class="text-red-500"><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>
                    <button type="submit" class="w-full bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700">
                        Create Appointment
                    </button>
                </form>
            </div>

        </section>
    </main>
</body>
</html>
