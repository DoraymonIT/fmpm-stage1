<?php
require_once("database_connect.php");
$id=$_POST['soutenance_id'];
$val=$_POST['accord'];
$motif=$_POST['motif'];
$etat=$_POST['etat']+1;
$response=array();
$response['id']=$id;
$response['etat']=$etat;
$response['erreur']='';
if ($val==1){
    $query=$db->query("UPDATE soutenance SET etat = '$etat' WHERE soutenance_id = '$id'");
    echo json_encode($response);
}elseif ($val==2){
    if ($motif!=''){
        $neg=(int)$etat*-1;
        $db->query("UPDATE soutenance SET etat = '$neg' WHERE soutenance_id = $id");
        $creneau_bloc = $db->query("UPDATE soutenance SET motif = '$motif' WHERE soutenance_id = $id");
        $response['etat']=$neg;
        echo json_encode($response);
    }else{
        $response['erreur']="Veuillez Remplir le champ Motif pour continuer.";
        echo json_encode($response);
    }

}else{
    $response['erreur']='Veuillez choisir votre choix';
    echo json_encode($response);
}
