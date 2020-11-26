<?php require_once 'database_connect.php';
ob_start();
session_start();

// Submit Soutenance : 
if (isset($_POST['submit_soutenence'])) {

    $date_depot = $_POST['date_depot_sujet'];
    $date_field = date('Y-m-d', strtotime($date_depot));
    $directeur_id = $_POST['directeur_these'];
    $intitule = $_POST['intitule'];
    $nature = $_POST['nature'];
    $materiel_echan = $_POST['materiel_echan'];
    $duree = $_POST['duree'];
    $lieu = $_POST['lieu'];
    $objectifs = $_POST['obj_etude'];
    $mots_cles = $_POST['mots_cles'];
    $president_id = $_POST['president_these'];
    $jury1_id = $_POST['jury1'];
    $jury2_id = $_POST['jury2'];
    $jury3_id = $_POST['jury3'];
    $jury4_id = $_POST['jury4'];
    $etudiant_id = $_SESSION['CNE'];
    $creneau_id = $_POST['creneau_heure'];
    $etat = 0;




    $sql = $db->query("INSERT INTO soutenance(date_depot_sujet,directeur,intitule_these,nature_these,materiel_d_etude_et_echantillioannage,duree_d_etude,lieu_d_etude,objectif_d_etude,mots_cles,president,jury1,jury2,jury3,jury4,etudiant,creneau,etat) VALUES ( '$date_field' , '$directeur_id' ,'$intitule','$nature','$materiel_echan', '$duree' , '$lieu','$objectifs' ,'$mots_cles' , '$president_id' , '$jury1_id' , '$jury2_id' , '$jury3_id', '$jury4_id' , '$etudiant_id', '$creneau_id', '$etat')");


    if ($sql) {
        $creneau_bloc = $db->query("UPDATE creneau SET etat = 2 WHERE id = $creneau_id ");
        header('location: etudiant.php');
    } else {
        // echo $mots_cles;
        echo "NO";
    }
    //  submit_soutenence
} else {
    echo "Erreur Veuillez ressayer";
}
if (isset($_POST['submit_edit_soutenance'])) {
    $soutenance_id = $_POST['soutenance_id'];
    $directeur_id = empty($_POST['directeur_these']) ? "" : ",directeur =" . $_POST['directeur_these'];
    $intitule = $_POST['intitule'];
    $nature = $_POST['nature'];
    $materiel_echan = $_POST['materiel_echan'];
    $duree = $_POST['duree'];
    $lieu = $_POST['lieu'];
    $objectifs = $_POST['obj_etude'];
    $mots_cles = $_POST['mots_cles'];
    $president_id = empty($_POST['president_these']) ? "" : ",president =" . $_POST['president_these'];
    $jury1_id = $_POST['jury1'];
    $jury2_id = $_POST['jury2'];
    $jury3_id = $_POST['jury3'];
    $jury4_id = $_POST['jury4'];
    $creneau_id = empty($_POST['creneau_change']) ? "" : ",creneau =" . $_POST['creneau_heure'];
    $query = "SELECT * FROM soutenance WHERE soutenance_id =$soutenance_id LIMIT 1 ";
    $result = $db->query($query);
    $soutenance = $result->fetch_assoc();
    if (!empty($_POST['creneau_change'])){
        $last_creneau=$soutenance['creneau'];
    }else{
        $last_creneau=null;
    }
    $pre=empty($_POST['president_these']) ? $soutenance['president'] : $_POST['president_these'];
    $dir=empty($_POST['directeur_these']) ? $soutenance['directeur'] : $_POST['directeur_these'];

    if ($soutenance['jury1'] != $jury1_id || $soutenance['jury2'] != $jury2_id || $soutenance['jury3'] != $jury3_id || $soutenance['jury4'] != $jury4_id || $soutenance['president'] != $pre || $soutenance['directeur'] != $dir) {
        $etat = 1;
    } else {
        $etat = 2;
    }

    $stmt = $db->prepare("UPDATE soutenance SET intitule_these=? , nature_these=? , materiel_d_etude_et_echantillioannage=? , duree_d_etude=? , lieu_d_etude=? , objectif_d_etude=? , mots_cles=? , jury1=? , jury2=? , jury3=? , jury4=?  " . $directeur_id  . $president_id  . $creneau_id . " , etat = ? where soutenance_id=?");

    $stmt->bind_param("sssssssiiiiii", $intitule,$nature,$materiel_echan,$duree,$lieu,$objectifs,$mots_cles,$jury1_id,$jury2_id,$jury3_id,$jury4_id,$etat,$soutenance_id);
    $sql=$stmt->execute();
    if ($sql) {

        if ($last_creneau!=null){
            $creneau_id=$_POST['creneau_heure'];
            $db->query("UPDATE creneau SET etat = 1 WHERE id = $last_creneau ");
            $creneau_bloc = $db->query("UPDATE creneau SET etat = 2 WHERE id = $creneau_id ");
        }
        header('location: etudiant.php');
    } else {
        // echo $mots_cles;
        echo "NO";
    }
    //  submit_soutenence
} else {
    echo "Erreur Veuillez ressayer";
}
