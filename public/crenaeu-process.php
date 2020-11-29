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
        ?>
        <option value="">Choisir un créneau disponible</option><?php
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
    function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }
    $date_depot = $_POST['daterange'];
    $startDate = new DateTime(explode("-", $date_depot)[0]);
    $endDate = new DateTime(explode("-", $date_depot)[1]);
    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($startDate, $interval, $endDate);
    $etat = 1;
    foreach ($period as $date) {
        $formatted_date=date_format($date,'Y-m-d');
        if (!isWeekend($formatted_date)){
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Amphi 1' ,'$etat','09:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Amphi 1' ,'$etat','11:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Amphi 1' ,'$etat','15:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Salle des Theses' ,'$etat','09:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Salle des Theses' ,'$etat','11:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Salle des Theses' ,'$etat','15:00:00')");
        }

    }
    header('location: create_creneau.php');
//
//
//    $sql = ;
//
//    if ($sql) {
//        echo "Yes";
//        header('location: create_creneau.php');
//    } else {
//        // echo $mots_cles;
//        echo "NO";
//    }
//    //  submit_soutenence
} else {
    echo "Erreur Veuillez ressayer";
}
?>