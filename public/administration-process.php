<?php
require_once("database_connect.php");
$id=$_POST['soutenance_id'];
$val=$_POST['accord'];
$motif=$_POST['motif'];

if ($val==1){
    $query=$db->query("UPDATE soutenance SET etat = '1' WHERE soutenance_id = '$id'");
    echo $id;
}elseif ($val==2){
    $db->query("UPDATE soutenance SET etat = -1 WHERE soutenance_id = $id");
    $creneau_bloc = $db->query("UPDATE soutenance SET motif = '$motif' WHERE soutenance_id = $id");
    echo $id;
}else{
    echo 'erreur';
}


