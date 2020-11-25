<?php
require_once("database_connect.php");
$max_date = $_POST["max-date"];
$min_date = $_POST["min-date"];
if (!empty($max_date) && !empty($min_date)) {
    $date_arr=array();

    $fmax_date= date_format(new DateTime($max_date), 'Y-m-d');
    $fmin_date= date_format(new DateTime($min_date), 'Y-m-d');
    $query = "SELECT * FROM creneau WHERE jour between '$fmin_date' and '$fmax_date' AND etat = 1 ";
    $result = mysqli_query($db, $query);
    if  (mysqli_num_rows($result) != 0) {
        foreach ($result as $c) {
            $date_arr[]=$c['jour'];
        }
        echo json_encode($date_arr);
    }
}

