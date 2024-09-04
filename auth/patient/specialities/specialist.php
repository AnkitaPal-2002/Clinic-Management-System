<?php 
    include '../../auth.php';
    include '../../../hooks/useParams.php';

    checkAccess('Patient', getHostURL());

    $speciality = $_GET['cat'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Specialist</title>
</head>
<body>
    <?php echo $speciality ?>
</body>
</html>