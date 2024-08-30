<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin | Update Doctor Details </title>
</head>
<body>
    <?php
    session_start();
    include('../components/navigation.php');
    include('../components/dangeralert.php');
    include('../components/successAlert.php');
if(isset($_SESSION['error'])){
    if($_SESSION['error'] == 'adminPasswordwrong'){
        danger('Admin please enter valid password');
        unset($_SESSION['error']);
    }
}

if(isset($_GET['username'])){
    include('../config/db.php');
    include('../hooks/useUser.php');

    if(isset($_GET['error'])){
        if($_GET['error'] == 'wrong'){
                danger('Admin enter wrong password!!!');
        }else if($_GET['error'] == 'dberror'){
                danger('Database problem');
        }
    }else if(isset($_GET['status'])){
        if($_GET['status'] == 'success'){
            success('updated sucessfully');
        }
    }    

   

    


    $dUserName = $_GET['username'];

    $doctor = getDoctor($connection, $dUserName);
    $doctor = $doctor[0];

    // print_r($doctor);

    //echo $doctor['doctorName'];

    ?>

<section>
        <div class="bg-white border rounded-lg px-8 py-6 mx-auto my-8 max-w-2xl">
            <h2 class="text-2xl font-medium mb-4">Update doctor details</h2>
            <form action="finalDoctorUpdate.php" method="post">
                <div class="mb-4">
                    <label for="dUserName" class="block text-gray-700 font-medium mb-2">Doctor's Username</label>
                    <input type="text" id="dUserName" name="UserName" value="<?php echo $dUserName?>"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" disabled>
                </div>

                <div class="mb-4">
                    <label for="dUserName" class="block text-gray-700 font-medium mb-2">Doctor's Username</label>
                    <input type="hidden" id="dUserName" name="dUserName" value="<?php echo $dUserName?>"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400">
                </div>

                <div class="mb-4">
                    <label for="doctorName" class="block text-gray-700 font-medium mb-2"> Doctor's Name</label>
                    <input type="text" id="doctorName" name="doctorName" value="<?php echo $doctor['doctorName']?>"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>


                <div class="mb-4">
                    <label for="doctorSpecialist" class="block text-gray-700 font-medium mb-2">Doctor's Specialities</label>
                    <select id="doctorSpecialist" name="doctorSpecialist" 
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                        <option value="<?php echo $doctor['doctorSpecialist']?>"><?php echo $doctor['doctorSpecialist']?></option>
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
                    <input type="number" id="doctorContacts" name="doctorContacts" value="<?php echo $doctor['doctorContacts']?>"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="mb-4">
                    <label for="doctorFess" class="block text-gray-700 font-medium mb-2">Doctor's Fess</label>
                    <input type="number" id="doctorFess" name="doctorFess" value="<?php echo $doctor['doctorFess']?>"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="mb-4">
                    <label for="doctorExperience" class="block text-gray-700 font-medium mb-2">Doctor's Experience</label>
                    <input type="number" id="doctorExperience" name="doctorExperience" min="0" max="60" value="<?php echo $doctor['doctorExperience']?>"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>
                
                <div class="mb-4">
                    <label for="doctorDescription" class="block text-gray-700 font-medium mb-2">Doctor's Description</label>
                    <textarea id="doctorDescription" name="doctorDescription" 
                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" rows="5">
                        <?php echo trim($doctor['doctorDescription'])?>
                    </textarea>
                </div>

                <div class="mb-4">
                    <label for="doctorEmail" class="block text-gray-700 font-medium mb-2">Doctor's Email</label>
                    <input type="email" id="doctorEmail" name="doctorEmail" value="<?php echo $doctor['doctorEmail']?>"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <!-- <div class="mb-4">
                    <label for="adminEmail" class="block text-gray-700 font-medium mb-2">Enter your Email</label>
                    <input type="email" id="doctorEmail" name="doctorEmail" value="<?php //echo $doctor['doctorEmail']?>"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div> -->

                <div class="mb-4">
                    <label for="adminPassword" class="block text-gray-700 font-medium mb-2">Enter your Password</label>
                    <input type="password" id="adminPassword" name="adminPassword"
                        class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" value="submit" name="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">Update Details</button>
                </div>

            </form>
        </div>
    </section>
    <?php

    

}


?>