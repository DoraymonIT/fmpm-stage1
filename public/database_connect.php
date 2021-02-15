<?php
 //$db = mysqli_connect('localhost', 'root', '', 'id15444825_rd','3306');
 $db = mysqli_connect('localhost', 'root', '', 'rd','3306');

 if(!$db) {
     die('Connection failed: ' . mysqli_connect_error());
     echo "Die";
 }

?>
