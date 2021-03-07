<?php require_once '../database_connect.php';
ob_start();
session_start();

// Submit Soutenance : 
if (isset($_POST['submit_these'])) {

    $directeur_id = substr($_POST['directeur_these'], 5);
    $intitule = $_POST['intitule'];
    $nature = $_POST['nature'];
    $materiel_echan = $_POST['materiel_echan'];
    $duree = $_POST['duree'];
    $lieu = $_POST['lieu'];
    $objectifs = $_POST['obj_etude'];
    $mots_cles = $_POST['mots_cles'];
    $etudiant_id = $_SESSION['CNE'];
    $etat = 0;


    $stmt = $db->prepare("INSERT INTO these(directeur ,intitule,nature_etude,materiel_etude_echan,duree_etude,lieu_etude,objectifes_etude,mots_cles,etudiant,etat) VALUES ( ?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("issssssssi", $directeur_id,$intitule, $nature, $materiel_echan, $duree, $lieu, $objectifs, $mots_cles, $etudiant_id, $etat);
    $sql = $stmt->execute();
    var_dump($db->error_list);

    if ($sql) {

        header('location: ../etudiant.php');
    } else {
        // echo $mots_cles;
        echo "NO";
    }
    //  submit_soutenence
} else {
    echo "Erreur Veuillez ressayer";
}
