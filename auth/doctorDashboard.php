<?php 
    include ('./auth.php');
    include('../hooks/useParams.php');
    checkAccess('Admin', getHostURL());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Global Clinic Doctor Dashboard</title>
</head>
<body>
    This is Doctor dashboard.
</body>
</html>