
<?php


function getAllPatientDetails($connection){
    // Fech all the patients deatils

    $sql = "select * from patients";
    $query = mysqli_query($connection, $sql);

    // Check for errors
    if (!$query) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Fetch all rows into an array
    $patients = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $patients[] = $row;
    }

    // Return the array of patients
    return $patients;

}
function getAllDoctorDetails($connection){
    // Fech all the doctors deatils

    $sql = "select * from doctors";
    $query = mysqli_query($connection, $sql);

    // Check for errors
    if (!$query) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Fetch all rows into an array
    $doctors = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $doctors[] = $row;
    }

    // Return the array of patients
    return $doctors;

}


?>