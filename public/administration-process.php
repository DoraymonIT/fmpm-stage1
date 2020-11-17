<?php 
require_once("database_connect.php");
if (isset($_POST['accord_administration'])) {

// $id =$
    $motif = $_POST['motif_admin'];

    $creneau_bloc = $db->query("UPDATE soutenance SET motif = '$motif' WHERE id = $id");

    if ($sql) {
        echo "Yes";
        header('location: administration.php');
    } else {
        // echo $mots_cles;
        echo "NO";
    }
    //  submit_soutenence
} else {
    echo "Erreur Veuillez ressayer";
}