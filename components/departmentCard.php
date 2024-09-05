<?php 
function departmentCard($departmentTitle, $departmentDesc, $departmentURL){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <!-- <img class="rounded-t-lg" src="https://images.pexels.com/photos/4031818/pexels-photo-4031818.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" /> -->
        </a>
        <div class="p-5">
            
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <?php echo $departmentTitle; ?>
            </h5>
           
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <?php echo $departmentDesc; ?>
            </p>
            <a href=<?php echo $departmentURL; ?>
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 gap-2">
                Book Appointment
                <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
            </a>
        </div>
    </div>

</body>
</html>

<?php
}
?>