
<?php

//session_start();



function getSecurityQuestions(){
    include("../config/db.php");

    $sql = "select * from securityquestions";
    $query = mysqli_query($connection, $sql);

    $securityquestions = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $securityquestions[] = $row;
    }

    return $securityquestions;

}

function getSecurityQuestionById($questionId, $connection){

    $sql = "select * from securityquestions where questionId = $questionId";
    $query = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($query);

    return $row;

}
?>