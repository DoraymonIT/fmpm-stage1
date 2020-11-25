<?php
require_once("database_connect.php");
$id = $_POST['soutenance_id'];
$val = $_POST['accord'];
$motif = $_POST['motif'];
$response = array();
$response['id'] = $id;
$response['erreur'] = '';
if ($val == 1) {
    $query = $db->query("UPDATE soutenance SET etat = '1' WHERE soutenance_id = '$id'");
    echo json_encode($response);
} elseif ($val == 2) {
    if ($motif != '') {
        $db->query("UPDATE soutenance SET etat = -1 WHERE soutenance_id = $id");
        $creneau_bloc = $db->query("UPDATE soutenance SET motif = '$motif' WHERE soutenance_id = $id");
        echo json_encode($response);
    } else {
        $response['erreur'] = "morif can't be empty";
        echo json_encode($response);
    }
} else {
    $response['erreur'] = 'veuiller choisir votre choix';
    echo json_encode($response);
}


