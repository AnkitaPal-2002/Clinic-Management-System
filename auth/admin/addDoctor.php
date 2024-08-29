<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin | Add Doctors</title>
</head>
<body>
    <?php
    include('../../components/navigation.php');
    include('../../components/dangeralert.php');
    include('../../components/successAlert.php');

    if(isset($_GET['error'])){
        if($_GET['error'] == 'userfail'){
            danger('Username already exists!!! Please try again !!!!');
        }else if($_GET['error'] == 'emailfail'){
            danger('Email already exists !!! Please try again!!!!');
        }else if($_GET['error'] == 'wrong'){
            danger('Something went wrong!!!!');
        }
    }else if(isset($_GET['success'])){
        if($_GET['success'] == 'true'){
            success('New doctor record created successfully!');
        } 
    }       
    ?>
    <section>
        <div class="bg-white border rounded-lg px-8 py-6 mx-auto my-8 max-w-2xl">
            <h2 class="text-2xl font-medium mb-4">Add a doctor</h2>
            <form action="../../helpers/addDoctorProcess.php" method="post">
                <div class="mb-4">
                    <label for="doctorName" class="block text-gray-700 font-medium mb-2"> Doctor's Name</label>
                    <input type="text" id="doctorName" name="doctorName"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="mb-4">
                    <label for="dUserName" class="block text-gray-700 font-medium mb-2">Doctor's Username</label>
                    <input type="text" id="dUserName" name="dUserName"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="mb-4">
                    <label for="doctorSpecialist" class="block text-gray-700 font-medium mb-2">Doctor's Specialities</label>
                    <select id="doctorSpecialist" name="doctorSpecialist"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                        <option value="">Select Specialities</option>
                        <option value="Anesthesiologists">Anesthesiologists</option>
                        <option value="Cardiologists">Cardiologists</option>
                        <option value="Colon and Rectal Surgeons">Colon and Rectal Surgeons</option>
                        <option value="Critical Care Medicine Specialists">Critical Care Medicine Specialists</option>
                        <option value="Dermatologists">Dermatologists</option>
                        <option value="Endocrinologists">Endocrinologists</option>
                        <option value="Emergency Medicine Specialists">Emergency Medicine Specialists</option>
                        <option value="Gastroenterologists">Gastroenterologists</option>
                        <option value="Geriatric Medicine Specialists">Geriatric Medicine Specialists</option>
                        <option value="Hematologists">Hematologists</option>
                        <option value="Nephrologists">Nephrologists</option>
                        <option value="Neurologists">Neurologists</option>
                        <option value="Obstetricians and Gynecologists">Obstetricians and Gynecologists</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="doctorContacts" class="block text-gray-700 font-medium mb-2">Doctor's Contacts Number</label>
                    <input type="number" id="doctorContacts" name="doctorContacts"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="mb-4">
                    <label for="doctorFess" class="block text-gray-700 font-medium mb-2">Doctor's Fess</label>
                    <input type="number" id="doctorFess" name="doctorFess"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="mb-4">
                    <label for="doctorExperience" class="block text-gray-700 font-medium mb-2">Doctor's Experience</label>
                    <input type="number" id="doctorExperience" name="doctorExperience" min="0" max="60"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>
                
                <div class="mb-4">
                    <label for="doctorDescription" class="block text-gray-700 font-medium mb-2">Doctor's Description</label>
                    <textarea id="doctorDescription" name="doctorDescription"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" rows="5"></textarea>
                </div>

                <div class="mb-4">
                    <label for="doctorEmail" class="block text-gray-700 font-medium mb-2">Doctor's Email</label>
                    <input type="email" id="doctorEmail" name="doctorEmail"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="mb-4">
                    <label for="doctorPassword" class="block text-gray-700 font-medium mb-2">Doctor's Password</label>
                    <input type="password" id="doctorPassword" name="doctorPassword"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" value="submit" name="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">Add a doctor</button>
                </div>

            </form>
        </div>
    </section>
</body>
</html>