<?php 
    include '../../auth.php';
    include '../../../hooks/useParams.php';

    checkAccess('Patient', getHostURL());

    // $doctorName = $_GET['docName'];
    //  Here you have to fetch the doctor details clickced by the user 
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
        <h2 class="text-2xl font-bold mb-6 text-center">Welcome UserName</h2>
        <section class="block md:flex gap-3 m-2">

            <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                <h3 class="text-xl font-semibold mb-4">Dashboard</h3>
                <nav>
                    <ul>
                        <li class="mb-2">
                            <a href=<?php echo getHostURL()."/auth/patientDashboard.php" ?> class="text-purple-600 hover:underline">Dashboard</a>
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
                <h3 class="text-xl font-semibold mb-4">Create an appointment</h3>
                <form>
                    <div class="mb-4">
                        <label for="doctors" class="block text-sm font-medium text-gray-700 mb-1">Doctors:</label>
                        <input type="text" id="fees" value="Ayan Saha" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="fees" class="block text-sm font-medium text-gray-700 mb-1">Consultancy Fees</label>
                        <input type="text" id="fees" value="550" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" id="date" class="w-full p-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="time" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                        <input type="time" id="time" class="w-full p-2 border rounded">
                    </div>
                    <button type="submit" class="w-full bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700">
                        <!-- After clicking this button Patient booking must be store in the database-->
                        Create a new appointment

                    </button>
                </form>
            </div>

        </section>
    </main>
</body>
</html>