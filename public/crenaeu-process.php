<?php
require_once("database_connect.php");
require_once("service.php");
session_start();
if (!empty($_POST["date_ex"])) {

    $date_selected = $_POST["date_ex"];
    // echo  date_format (new DateTime($countryId), 'Y-m-d');
    $date_formatted = date_format(new DateTime($date_selected), 'Y-m-d');
    $query = "SELECT * FROM creneau WHERE jour= '$date_formatted' AND etat = 1 ";
    $result = mysqli_query($db, $query);
    ?>
    <?php
    if (mysqli_num_rows($result) === 0) {
        ?>
        <div>Oups !! Aucun Créneau Disponible !!</div>
        <?php
    } else {

        foreach ($result as $op) {
            ?>
            <input type="radio" class="mr-1" value="<?php echo $op["id"]; ?>" id="<?php echo "creneau" . $op["id"]; ?>"
                   name="creneau_heure"><label
                    for="<?php echo "creneau" . $op["id"]; ?>"><?php echo $op["heure"] . " , Lieu : " . $op["lieu"] ?></label>
            <br>

            <?php
        }
    }
    ?>
    <?php

}
if (isset($_POST['submit-creneau'])) {
    function isWeekend($date)
    {
        return (date('N', strtotime($date)) >= 6);
    }

    $date_depot = $_POST['daterange'];
    $startDate = new DateTime(explode("-", $date_depot)[0]);
    $endDate = new DateTime(explode("-", $date_depot)[1]);
    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($startDate, $interval, $endDate);
    $etat = 1;
    foreach ($period as $date) {
        $formatted_date = date_format($date, 'Y-m-d');
        if (!isWeekend($formatted_date)) {
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Amphi 1' ,'$etat','09:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Amphi 1' ,'$etat','11:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Amphi 1' ,'$etat','15:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Salle des Thèses' ,'$etat','09:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Salle des Thèses' ,'$etat','11:00:00')");
            $db->query("INSERT INTO creneau(jour,lieu,etat,heure) VALUES ( '$formatted_date' , 'Salle des Thèses' ,'$etat','15:00:00')");
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
}
if (isset($_POST['submit_creneau_date'])) {

    $today = date("Y-m-d H:i:s");
    var_dump($today);
    $date = $_POST['creneau_heure'];
    var_dump($date);
    $cne = $_SESSION['CNE'];
    var_dump($cne);
    $soutenance = get_soutenance_result(array('etudiant' => $cne))->fetch_assoc();
    if ($soutenance['creneau'] == null) {
        $sql = $db->query("UPDATE soutenance SET creneau='$date',etat=5 WHERE etudiant='$cne'");
        var_dump($db->error_list);
        if ($sql) {
            $sql = $db->query("UPDATE creneau SET etat=2,date_reservation='$today' WHERE id='$date' ");
            if ($sql) {
                header('location: etudiant.php');
            }
        }
    } else {
        $last = $soutenance['creneau'];
        $db->query("UPDATE creneau SET etat=1,date_reservation=null WHERE id='$last' ");
        $sql = $db->query("UPDATE soutenance SET creneau='$date',etat=5 WHERE etudiant='$cne'");
        if ($sql) {
            $sql = $db->query("UPDATE creneau SET etat=2,date_reservation='$today' WHERE id='$date' ");
            if ($sql) {
                header('location: etudiant.php');
            }
        }
    }


}
?>