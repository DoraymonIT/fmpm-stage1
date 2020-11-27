<?php
require_once("database_connect.php");
if (!empty($_POST["date_ex"])) {

    $date_selected = $_POST["date_ex"];
    var_dump($date_selected);
    // echo  date_format (new DateTime($countryId), 'Y-m-d');
    $date_formatted = date_format(new DateTime($date_selected), 'Y-m-d');
    var_dump($date_formatted);
    $query = "SELECT * FROM creneau WHERE jour= '$date_formatted' AND etat = 1";
    $result = mysqli_query($db, $query);
?>
    <?php
    if (mysqli_num_rows($result) === 0) {
    ?>
        <option value="">Oups !! Aucun Créneau Disponible !!</option>
    <?php
    } else {
    ?> <option value="">Choisir un créneau disponible</option><?php
                                                                foreach ($result as $op) {
                                                                ?>

            <option value="<?php echo $op["id"]; ?>"><?php echo $op["heure"] . " , Lieu : " . $op["lieu"] ?></option>
    <?php
                                                                }
                                                            }
    ?> }
<?php

}
if (isset($_POST['submit-creneau'])) {

    $date_depot = $_POST['jour'];
    $date_field  = date('Y-m-d', strtotime($date_depot));
    $time = $_POST['time_heure'];
    $lieu = $_POST['lieu'];
    $etat = 1;

    $sql = $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$date_field' , '$lieu' ,'$etat','$time')");

    if ($sql) {
        echo "Yes";
        header('location: create_creneau.php');
    } else {
        // echo $mots_cles;
        echo "NO";
    }
    //  submit_soutenence
} else {
    echo "Erreur Veuillez ressayer";
}
?>