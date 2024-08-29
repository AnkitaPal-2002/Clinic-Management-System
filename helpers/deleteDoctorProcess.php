<?php

include("../config/db.php");
include("../hooks/useParams.php");

$url=getHostURL();

if(isset($_GET["username"])){
    $dUserName = mysqli_real_escape_string($connection, strip_tags($_GET['username']));

    $deleteQuery = "DELETE FROM doctors WHERE dUserName = '$dUserName'";

    if (mysqli_query($connection, $deleteQuery)) {
        echo $dUserName;
       header('Location: '.$url.'/auth/admin/doctorList.php?success=true');
        exit();
    } else {
        header('Location: '.$url.'/auth/admin/doctorList.php?error=wrong');
    }
    
}



?>