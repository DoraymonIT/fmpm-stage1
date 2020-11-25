<?php
require_once('database_connect.php');
$x = $_POST['id'];
$query = "SELECT * FROM creneau";
$result = mysqli_query($db, $query);
while ($row = $result->fetch_assoc()) {
    if ($row['etat'] == 1) {
        $query = "DELETE FROM creneau WHERE id = $x ";
        $result = mysqli_query($db, $query);
    } else {
        echo "No";
    }
}
