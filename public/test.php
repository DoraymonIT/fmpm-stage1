<?php
require_once("database_connect.php");
$min_date = $_POST["min-date"];
if (!empty($min_date)) {
    $date_arr=array();

    $fmin_date= date_format(new DateTime($min_date), 'Y-m-d');
    $query = "SELECT * FROM creneau WHERE jour >= '$fmin_date'  AND etat = 1 ";
    $result = mysqli_query($db, $query);
    if  (mysqli_num_rows($result) != 0) {
        foreach ($result as $c) {
            $date_arr[]=$c['jour'];
        }
        echo json_encode($date_arr);
    }
}

