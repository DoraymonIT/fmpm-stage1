<?php
require_once('database_connect.php');
ob_start();
session_start();
// administration 3 
// Prof
// directeur 2
// president 1 
// comite 1
$who = $_GET['who'];
if (!empty($_SESSION['noProf'])) {
    $id = $_SESSION['noProf'];
    if ($who == 1) {
        $titre = "Directeur";
        $query = "SELECT * FROM soutenance WHERE  directeur = $id AND etat >=3 or etat <= -3";
    } elseif ($who == 2) {
        $titre = "Président";
        $query = "SELECT * FROM soutenance WHERE president = $id AND etat >=4 or etat <= -4";
    } elseif ($who == 5) {
        $titre = "Président";
        $query = "SELECT * FROM soutenance WHERE directeur = $id AND etat >=7 or etat <= -7";
    } else header('location: index.php');
} elseif (!empty($_SESSION['comite']) && $who == 3) {

    $titre = "Comité du thèse | Validation du membres de jury .";
    $query = "SELECT * FROM soutenance WHERE etat >=2 or etat <= -2";
} elseif (!empty($_SESSION['num'])) {
    if ($who == 4) {
        $titre = "Administration | Validation des relevés de notes et les cliniques ";
        $query = "SELECT * FROM soutenance WHERE etat >=1 or etat <= -1";
    } elseif ($who == 6) {
        $titre = "Administration | Validation finale";
        $query = "SELECT * FROM soutenance WHERE etat >=8 or etat <= -8";
    }
    elseif ($who == 7) {
        $titre = "Administration | A soutenu";
        $query = "SELECT * FROM soutenance WHERE etat >=9 or etat <= -9";
    }
} else header('location: index.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
        a {
            color: black;
            /* font-weight: 800; */
            text-decoration: none;
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }

        a:hover {
            color: black;
        }
    </style>
    <title>
        HistoriQue | Voir le progresse de demande de thèse .
    </title>
</head>

<body>
    <header class="backk">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img style="float: left" src="assets/img/minstere.png" alt="Ministere LOGO" width="50%" />
                </div>
                <div class="col-md-6">
                    <img style="float: right" src="assets/img/FMPM.png" alt="FMPM Logo" width="50%" />
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 title">
                    <h3><u>Espace <?php echo $titre ?> </u></h3>
                    <?php if (isset($_SESSION['noProf']) || isset($_SESSION['num']) || isset($_SESSION['comite'])) : ?>
                        <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                            Vous êtes Connecte : <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> !</h6>
                        <p><a href="logout.php" class="btn btn-primary" role="button">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></p>
                    <?php endif ?>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h5 class="crenau">
                        <i class="fa fa-history" aria-hidden="true"></i> Historique en tant
                        que <?php echo $titre ?>
                    </h5>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-success btn-sm" href="<?php if (!empty($_SESSION['num']) && $who == 4 || $who == 6 || $who == 7) {
                                                                        echo "acceuilAdministration.php";
                                                                    } elseif (!empty($_SESSION['comite']) && $who == 3) {
                                                                        echo "comite_these.php";
                                                                    } elseif (!empty($_SESSION['noProf']) && $who == 1 || $who == 5 || $who == 2) {
                                                                        echo "prof.php";
                                                                    } ?>" role="button">
                                <i class="fa fa-caret-left" aria-hidden="true"></i> Retour</a>
                        </div>
                        <div class="col-md-8"></div>
                    </div>
                    <br />
                    <table class="table table-hover table-striped table-bordered myTable table-responsive-xl " style="
    word-wrap: break-word;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Étudiant(e)</th>
                                <th>CNE</th>
                                <!-- <th>Numéro Apogée</th> -->
                                <th>Sujet</th>
                                <!-- <th>Date choisi</th> -->
                                <th>L'Accord</th>

                            </tr>
                        </thead>
                        <tbody role="tablist" id="accordion-1">
                            <?php
                            $result = mysqli_query($db, $query);
                            if (mysqli_num_rows($result) == 0) {
                                echo '<tr><td colspan="8" class="text-center">Aucune soutenance trouve</td></tr>';
                            }
                            while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr id="row_<?php echo $row['soutenance_id'] ?>" role="tab">
                                    <td>
                                        <a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-<?php echo $row['soutenance_id'] ?>" class="btn btn-info rounded-circle" href="#accordion-1 .item-<?php echo $row['soutenance_id'] ?>"><i class="fa fa-caret-down"></i></a>
                                    </td>
                                    <td>
                                        <?php
                                        $cne = $row['etudiant'];
                                        $etu = "SELECT * FROM etudiant WHERE CNE = '$cne' ";
                                        $res = mysqli_query($db, $etu);
                                        while ($row1 = $res->fetch_assoc()) {
                                            echo $row1['nom'] . " " . $row1['prenom'];
                                        } ?>

                                    </td>
                                    <td> <?php echo $row['etudiant']; ?>
                                    </td>
                                    <td> <?php echo $row['intitule_these']; ?></td>
                                    <!--                                    <td> --><?php
                                                                                    //                                            $creneau_id = $row['creneau'];
                                                                                    //                                            $query1 = "SELECT * FROM creneau WHERE id ='$creneau_id' LIMIT 1 ";
                                                                                    //
                                                                                    //                                            $result1 = $db->query($query1);
                                                                                    //
                                                                                    //                                            $creneau = $result1->fetch_assoc();
                                                                                    //                                            echo $creneau['jour'] . " : " . date('H:i', strtotime($creneau['heure'])) . " " . $creneau['lieu'];
                                                                                    //
                                                                                    //                                            
                                                                                    ?>
                                    <!--</td>-->

                                    <td>
                                        <?php
                                        switch ($who) {
                                            case 1:
                                                $etat = 3;
                                                break;
                                            case 2:
                                                $etat = 4;
                                                break;
                                            case 3:
                                                $etat = 2;
                                                break;
                                            case 4:
                                                $etat = 1;
                                                break;
                                            case 5:
                                                $etat = 7;
                                                break;
                                            case 6:
                                                $etat = 8;
                                                break;
                                                case 7:
                                                    $etat = 9;
                                                    break;
                                        }

                                        if ($row['etat'] >= $etat || $row['etat'] < (int)$etat * -1) {
                                            echo "OUI";
                                        } else if ($row['etat'] == (int)$etat * -1) {
                                            echo "NON";
                                        }
                                        ?>

                                    </td>


                                </tr>
                                <tr class="collapse item-<?php echo $row['soutenance_id'] ?>" role="tabpanel" data-parent="#accordion-1">
                                    <td colspan="9">
                                        <div class="container-fluid">
                                            <h6 class="crenau"><i class="fa fa-info-circle" aria-hidden="true"></i> Info sur le soutenance : <?php echo $row['soutenance_id'] ?></h6>
                                            <div class="row" style="    text-align: left;">
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li>
                                                            <h6> Date de depot du sujet : <?php echo $row['date_depot_sujet'] ?></h6>
                                                        </li>
                                                        <li>
                                                            <h6>
                                                                Directeur : <?php
                                                                            $prof_detailes = "SELECT * FROM prof WHERE id = " . $row['directeur'] . " ";
                                                                            $result1 = mysqli_query($db, $prof_detailes);
                                                                            while ($row1 = $result1->fetch_assoc()) {
                                                                                echo $row1['nom'] . " " . $row1['prenom'];
                                                                            } ?>
                                                            </h6>
                                                        </li>
                                                        <li>
                                                            <h6>Intitule du these : <?php
                                                                                    $id = $row['id_these'];
                                                                                    $these = "SELECT * FROM these WHERE id = '$id' ";
                                                                                    $res = mysqli_query($db, $these);
                                                                                    while ($row1 = $res->fetch_assoc()) {
                                                                                        echo $row1['intitule'];
                                                                                    } ?></h6>

                                                        </li>
                                                        <li>
                                                            <h6>Nature du these :
                                                                <?php
                                                                $id = $row['id_these'];
                                                                $these = "SELECT * FROM these WHERE id = '$id' ";
                                                                $res = mysqli_query($db, $these);
                                                                while ($row1 = $res->fetch_assoc()) {
                                                                    echo $row1['nature_etude'];
                                                                } ?>
                                                            </h6>

                                                        </li>
                                                        <li>
                                                            <h6> Materiel d etude et Echantillage :
                                                                <?php
                                                                $id = $row['id_these'];
                                                                $these = "SELECT * FROM these WHERE id = '$id' ";
                                                                $res = mysqli_query($db, $these);
                                                                while ($row1 = $res->fetch_assoc()) {
                                                                    echo $row1['materiel_etude_echan'];
                                                                } ?></h6>
                                                        </li>
                                                        <li>
                                                            <h6> Duree de l etude : <?php
                                                                                    $id = $row['id_these'];
                                                                                    $these = "SELECT * FROM these WHERE id = '$id' ";
                                                                                    $res = mysqli_query($db, $these);
                                                                                    while ($row1 = $res->fetch_assoc()) {
                                                                                        echo $row1['duree_etude'];
                                                                                    } ?></h6>
                                                        </li>
                                                        <li>
                                                            <h6> Lieu de l etude : <?php
                                                                                    $id = $row['id_these'];
                                                                                    $these = "SELECT * FROM these WHERE id = '$id' ";
                                                                                    $res = mysqli_query($db, $these);
                                                                                    while ($row1 = $res->fetch_assoc()) {
                                                                                        echo $row1['lieu_etude'];
                                                                                    } ?></h6>
                                                        </li>
                                                        <li>
                                                            <h6>
                                                                Mots Cles :
                                                                <?php
                                                                $id = $row['id_these'];
                                                                $these = "SELECT * FROM these WHERE id = '$id' ";
                                                                $res = mysqli_query($db, $these);
                                                                while ($row1 = $res->fetch_assoc()) {
                                                                    echo $row1['mots_cles'];
                                                                } ?>


                                                            </h6>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li>
                                                            <h6> President de Jury : <?php
                                                                                        $prof_detailes = "SELECT * FROM prof WHERE id = " . $row['president'] . " ";
                                                                                        $result1 = mysqli_query($db, $prof_detailes);
                                                                                        while ($row1 = $result1->fetch_assoc()) {
                                                                                            echo $row1['nom'] . " " . $row1['prenom'];
                                                                                        } ?></h6>
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <ol>
                                                            <li>
                                                                <h6> Membre de jury 1 : <?php
                                                                                        $prof_detailes = "SELECT * FROM prof WHERE id = " . $row['jury1'] . " ";
                                                                                        $result1 = mysqli_query($db, $prof_detailes);
                                                                                        while ($row1 = $result1->fetch_assoc()) {
                                                                                            echo $row1['nom'] . " " . $row1['prenom'];
                                                                                        } ?></h6>
                                                            </li>
                                                            <li>
                                                                <h6> Membre de jury 2 : <?php
                                                                                        $prof_detailes = "SELECT * FROM prof WHERE id = " . $row['jury2'] . " ";
                                                                                        $result1 = mysqli_query($db, $prof_detailes);
                                                                                        while ($row1 = $result1->fetch_assoc()) {
                                                                                            echo $row1['nom'] . " " . $row1['prenom'];
                                                                                        } ?></h6>
                                                            </li>
                                                            <li>
                                                                <h6> Membre de jury 3 : <?php
                                                                                        $prof_detailes = "SELECT * FROM prof WHERE id = " . $row['jury3'] . " ";
                                                                                        $result1 = mysqli_query($db, $prof_detailes);
                                                                                        while ($row1 = $result1->fetch_assoc()) {
                                                                                            echo $row1['nom'] . " " . $row1['prenom'];
                                                                                        } ?></h6>
                                                            </li>
                                                            <li>
                                                                <h6> Membre de jury 4 : <?php
                                                                                        $prof_detailes = "SELECT * FROM prof WHERE id = " . $row['jury4'] . " ";
                                                                                        $result1 = mysqli_query($db, $prof_detailes);
                                                                                        while ($row1 = $result1->fetch_assoc()) {
                                                                                            echo $row1['nom'] . " " . $row1['prenom'];
                                                                                        } ?></h6>
                                                            </li>
                                                        </ol>

                                                    </ul>
                                                    <!-- <ul>
                                                        <li>
                                                            <h6> <?php

                                                                    $id = $row['creneau'];
                                                                    $creneau = "SELECT * FROM creneau WHERE id ='$id' ";
                                                                    $result1 = mysqli_query($db, $creneau);
                                                                    while ($row1 = $result1->fetch_assoc()) {
                                                                    ?>
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i> <u> Date choisie</u> :
                                                                    <b> <?php
                                                                        echo $row1['jour'] . " : " . date('H:i', strtotime($row1['heure']));;

                                                                        ?> ; </b>
                                                                    <u><i class="fa fa-location-arrow" aria-hidden="true"></i> Lieu</u> :
                                                                    <b>
                                                                    <?php
                                                                        echo $row1['lieu'];
                                                                    } ?></h6>
                                                        </li>
                                                    </ul> -->
                                                </div>
                                                <!-- <div class="col-md-4"></div> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            <?php
                            } ?>
                        </tbody>

                    </table>
                    <!-- <button class="btn btn-success btn-custom" type="submit">
    <i class="fa fa-check-circle" aria-hidden="true"></i> Valider
  </button> -->
                </div>

            </div>

        </div>
    </section>
    <hr />
    <footer>
        <p>
            Service de scolarité de FMPM
            <i class="fa fa-copyright" aria-hidden="true"></i> 2020
        </p>
    </footer>
</body>
<script src="assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    function enregister(row_id, etat) {
        row = document.getElementsByName('radio_' + row_id.toString());
        value = null;
        for (let i = 0; i < row.length; i++) {
            radio = row[i]
            if (radio.checked) {
                value = radio.value
            }
        }
        motif = null
        if (parseInt(value) === 2) {
            motif = document.getElementById("motif_" + row_id).value
        }
        const data = {
            "soutenance_id": row_id,
            "etat": etat,
            "accord": value,
            "motif": motif

        };
        console.log(data)
        $.ajax({
            type: "POST",
            url: "prof-process.php",
            data: data,
            success: function(id) {
                $("#row_" + id).remove();

            },
            dataType: 'text'
        });

    }

    function getIfYesOrNon(val, id) {
        row = document.querySelector('#row_' + id.toString())
        motif = row.childNodes[13]
        if (parseInt(val) === 2) {


            motif.childNodes[1].style.display = "block";

        } else {

            motif.childNodes[1].style.display = "none";
        }
    }
</script>

</html>