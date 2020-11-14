<?php
 $db = mysqli_connect('localhost', 'root', '', 'rdvduthese','3306');
 if(!$db) {
     die('Connection failed: ' . mysqli_connect_error());
     echo "Die";
 }

?>
