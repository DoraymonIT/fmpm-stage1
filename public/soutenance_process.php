<?php require_once 'database_connect.php';
ob_start();
session_start();

// Submit Soutenance : 
if (isset($_POST['submit_soutenence'])) {


    $president_id = substr($_POST['president_these'], 5);
    $jury1_id = substr($_POST['jury1'], 5);
    $jury2_id = substr($_POST['jury2'], 5);
    $jury3_id = substr($_POST['jury3'], 5);
    $jury4_id = substr($_POST['jury4'], 5);
    $etudiant_id = $_SESSION['CNE'];
    $these_id = $_POST['these'];
    $directeur = $_POST['directeur'];
    $etat = 0;

    $stmt = $db->prepare("INSERT INTO soutenance(directeur,president,jury1,jury2,jury3,jury4,etudiant,etat,these) VALUES ( ? , ? , ?, ? , ?,  ?,?,?,?)");

    $stmt->bind_param("iiiiiisii",  $directeur,$president_id, $jury1_id, $jury2_id, $jury3_id, $jury4_id, $etudiant_id, $etat,$these_id);

    $sql = $stmt->execute();
    var_dump($db->error_list);



    if ($sql) {

        header('location: etudiant.php');
    } else {
        // echo $mots_cles;
        echo "NO";
    }
    //  submit_soutenence
} else {
    echo "Erreur Veuillez ressayer";
}
if (isset($_POST['valider_date_etudiant'])) {
    $cne = $_POST['cne'];
    $db->query("UPDATE soutenance SET etat=6 WHERE etudiant='$cne' AND etat=5");
    var_dump($db->error_list);
    header('location: etudiant.php');
}
if (isset($_POST['submit_edit_soutenance'])) {
    $soutenance_id = $_POST['soutenance_id'];
    $president_id = empty($_POST['president_these']) ? "" : ",president =" . $_POST['president_these'];
    $jury1_id = $_POST['jury1'];
    $jury2_id = $_POST['jury2'];
    $jury3_id = $_POST['jury3'];
    $jury4_id = $_POST['jury4'];
    $query = "SELECT * FROM soutenance WHERE soutenance_id =$soutenance_id LIMIT 1 ";
    $result = $db->query($query);
    $soutenance = $result->fetch_assoc();
    $pre = empty($_POST['president_these']) ? $soutenance['president'] : $_POST['president_these'];

    $etat=2;

    $stmt = $db->prepare("UPDATE soutenance SET   jury1=? , jury2=? , jury3=? , jury4=?
       "  . $president_id  . " , etat = ? where soutenance_id=?");

    $stmt->bind_param("iiiiii",  $jury1_id, $jury2_id, $jury3_id, $jury4_id, $etat, $soutenance_id);
    $sql = $stmt->execute();
    if ($sql) {


        $sql = $db->query("UPDATE soutenance SET motif = NULL WHERE soutenance_id = $soutenance_id");
        header('location: etudiant.php');
        $_SESSION['edite_soutenenace'] = "Votre demande a été éditer avec succès !";
    } else {
        // echo $mots_cles;
        echo "NO";
    }
    //  submit_soutenence
} else {
    echo "Erreur Veuillez ressayer plus tard";
}
