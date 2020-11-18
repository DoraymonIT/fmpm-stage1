<?php
require_once("database_connect.php");
$id=$_POST['soutenance_id'];
$val=$_POST['accord'];
$motif=$_POST['motif'];
$etat=$_POST['etat']+1;

if ($val==1){
    $query=$db->query("UPDATE soutenance SET etat = '$etat' WHERE soutenance_id = '$id'");
    echo $id;
}elseif ($val==2){
    $neg=(int)$etat*-1;
    $db->query("UPDATE soutenance SET etat = '$neg' WHERE soutenance_id = $id");
    $creneau_bloc = $db->query("UPDATE soutenance SET motif = '$motif' WHERE soutenance_id = $id");
    echo $id;
}else{
    echo 'erreur';
}