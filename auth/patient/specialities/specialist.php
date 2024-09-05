<?php 
    include '../../auth.php';
    include '../../../hooks/useParams.php';

    checkAccess('Patient', getHostURL());

    $speciality = $_GET['cat'];
    // here you have to Fetch all the doctors information by there category(specialization)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Doctor Specialist list</title>
</head>
<body>
    <?php include ('../../../components/navigation.php'); ?>
   
    <section class="max-w-6xl mx-auto">
        <h1 class="text-2xl my-4 font-bold underline cursor-default">List of all the  <?php echo $speciality ?></h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 p-4">
            <!-- Here display all the doctor list -->
    
        <?php
        //    Include the departMentCard(doctorName, docDescription) and pass the doctor name, description and url;
        //    Refer departmentList.php for implementing multiple doctors cart using foreach loop
    
        ?>
        </div>
    </section>

</body>
</html>