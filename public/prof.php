<?php
require_once('database_connect.php');
ob_start();
session_start();
if (empty($_SESSION['noProf'])) {
    header('location: index.php');
}

$id = $_SESSION['noProf'];
$query = "SELECT * FROM soutenance WHERE etat = 2 and directeur = $id";
$result_directeur = mysqli_query($db, $query);
$query = "SELECT * FROM soutenance WHERE etat = 3 and president = $id";
$result_president = mysqli_query($db, $query);
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
        Accueil du professeurs | Voir le progresse de demande de thèse .
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
                    <h3><u>Espace Professeur</u></h3>
                    <?php if (isset($_SESSION['noProf'])) : ?>
                        <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                            Vous êtes Connecte : <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> !</h6>
                        <p><a href="logout.php" class="btn btn-primary" role="button">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>
                    <?php endif ?>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h5 class="crenau">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Tableau de
                        Confirmation d accord pour les dates
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <ul class="nav nav-pills nav-justified" id="pills-tab" style="border: 2px solid teal;border-radius: 8px" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#president_tab" role="tab" aria-controls="pills-home" aria-selected="true"> <i class="fa fa-user-circle" aria-hidden="true"></i>
                                Président<span id="bagde_president" class="badge badge-dark ml-1"><?php echo mysqli_num_rows($result_president) ?></span></a>
                        </li>
                        <span style="padding-left: 2px;"></span>
                        <li class="nav-item" style="margin-right: -4px">
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#directeur_tab" role="tab" aria-controls="pills-profile" aria-selected="false"> <i class="fa fa-user-md" aria-hidden="true"></i> Directeur<span id="bagde_directeur" class="badge badge-dark ml-1"><?php echo mysqli_num_rows($result_directeur) ?></span></a>
                        </li>
                        <span style="padding-left: 2px;"></span>

                    </ul>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active " id="directeur_tab" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row mt-3">
                        <div class="col-md-3"> <a class="btn btn-success btn-block btn-sm" href="historique.php?who=1" role="button"> <i class="fa fa-history" aria-hidden="true"></i> Historique</a> </div>
                        <div class="col-md-8"></div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">

                            <br />
                            <table class="table table-hover table-striped table-bordered myTable table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Étudiant(e)</th>
                                        <th>CNE</th>
                                        <!-- <th>Numéro Apogée</th> -->
                                        <th>Sujet</th>
                                        <!-- <th>Date choisi</th> -->
                                        <th>L'Accord</th>
                                        <th>Motif</th>
                                        <!-- <th>Info</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody role="tablist" id="accordion-1">
                                    <?php

                                    if (mysqli_num_rows($result_directeur) == 0) {
                                        echo '<tr><td colspan="9" class="text-center">Aucune soutenance trouve</td></tr>';
                                    }
                                    while ($row = $result_directeur->fetch_assoc()) {

                                    ?>
                                        <tr id="row_<?php echo $row['soutenance_id'] ?>" role="tab">
                                            <td>
                                                <a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-<?php echo $row['soutenance_id'] ?>" class="btn btn-info rounded-circle" href="#accordion-1 .item-<?php echo $row['soutenance_id'] ?>">
                                                    <i class="fa fa-caret-down"></i></a>
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
                                            <td> <?php
                                                                                    $id = $row['id_these'];
                                                                                    $these = "SELECT * FROM these WHERE id = '$id' ";
                                                                                    $res = mysqli_query($db, $these);
                                                                                    while ($row1 = $res->fetch_assoc()) {
                                                                                        echo $row1['intitule'];
                                                                                    } ?></td>
                                            <!-- <td> <?php
                                                    $creneau_id = $row['creneau'];
                                                    $query1 = "SELECT * FROM creneau WHERE id ='$creneau_id' LIMIT 1 ";

                                                    $result1 = $db->query($query1);

                                                    $creneau = $result1->fetch_assoc();
                                                    echo $creneau['jour'] . " " . $creneau['heure'] . " " . $creneau['lieu'];

                                                    ?></td> -->

                                            <td>
                                                <fieldset class="px-2 ml-1 d-flex flex-column" id="radio_<?php echo $row['soutenance_id'] ?>">
                                                    <div>
                                                        <input class="form-check-input" type="radio" name="radio_<?php echo $row['soutenance_id'] ?>" value="1" onChange="getIfYesOrNon(this.value,<?php echo $row['soutenance_id'] ?>)" />
                                                        <label class="form-check-label"> Oui </label>
                                                    </div>
                                                    <span id="bla">
                                                        <!-- When the button is "NON" a Popup opens say the admin to put in
                         the form why he or she choose No "Description of the problem"  -->
                                                        <input class="form-check-input" type="radio" name="radio_<?php echo $row['soutenance_id'] ?>" value="2" onChange="getIfYesOrNon(this.value,<?php echo $row['soutenance_id'] ?>)" />
                                                        <label class="form-check-label"> Non </label></span>
                                                </fieldset>

                                            </td>
                                            <td>
                                                <div class="row" style="display: none">
                                                    <div class="mx-2">
                                                        <textarea id="motif_<?php echo $row['soutenance_id'] ?>" name="" class="form-control form-control-sm" placeholder=" le motif ou problème " required></textarea>
                                                    </div>
                                                </div>

                                            </td>
                                            <!-- <td>
                                                <a data-toggle="collapse" aria-expanded="true" 
                                                aria-controls="accordion-1 .item-<?php echo $row['soutenance_id'] ?>"
                                                 class="btn btn-info rounded-circle" 
                                                 href="#accordion-1 .item-<?php echo $row['soutenance_id'] ?>">
                                                 <i class="fa fa-caret-down"></i></a>
                                            </td> -->
                                            <td>
                                                <button class="btn btn-success btn-sm" onclick="enregister(<?php echo $row['soutenance_id'] ?>,<?php echo $row['etat'] ?>)">
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                    Enregistrer
                                                </button>
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
                                                    <!-- <?php

                                                                    $id = $row['creneau'];
                                                                    $creneau = "SELECT * FROM creneau WHERE id ='$id' ";
                                                                    $result1 = mysqli_query($db, $creneau);
                                                                    while ($row1 = $result1->fetch_assoc()) {
                                                                    ?>
                                                                    <?php
                                                                        echo $row1['jour'] . " : " . date('H:i', strtotime($row1['heure']));;

                                                                        ?> 
                                                                    <?php
                                                                        echo $row1['lieu'];
                                                                    } ?> -->
                                                       
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
                <div class="tab-pane fade  " id="president_tab" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row mt-3">
                        <div class="col-md-3"> <a class="btn btn-success btn-block btn-sm" href="historique.php?who=2" role="button"> <i class="fa fa-history" aria-hidden="true"></i> Historique</a> </div>
                        <div class="col-md-8"></div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">

                            <br />
                            <table class="table table-hover table-striped table-bordered myTable table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Étudiant(e)</th>
                                        <th>CNE</th>
                                        <!-- <th>Numéro Apogée</th> -->
                                        <th>Sujet</th>
                                        <!-- <th>Date choisi</th> -->
                                        <th>L'Accord</th>
                                        <th>Motif</th>
                                        <!-- <th>Info</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody role="tablist" id="accordion-2">
                                    <?php

                                    if (mysqli_num_rows($result_president) == 0) {
                                        echo '<tr><td colspan="9" class="text-center">Aucune soutenance trouve</td></tr>';
                                    }
                                    while ($row = $result_president->fetch_assoc()) {

                                    ?>
                                        <tr id="row_<?php echo $row['soutenance_id'] ?>" role="tab">
                                            <td> <a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-2 .item-<?php echo $row['soutenance_id'] ?>" class="btn btn-info rounded-circle" href="#accordion-2 .item-<?php echo $row['soutenance_id'] ?>"><i class="fa fa-caret-down"></i></a>
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
                                            <td> <?php
                                                                                    $id = $row['id_these'];
                                                                                    $these = "SELECT * FROM these WHERE id = '$id' ";
                                                                                    $res = mysqli_query($db, $these);
                                                                                    while ($row1 = $res->fetch_assoc()) {
                                                                                        echo $row1['intitule'];
                                                                                    } ?></td>
                                            <!-- <td> <?php
                                                    $creneau_id = $row['creneau'];
                                                    $query1 = "SELECT * FROM creneau WHERE id ='$creneau_id' LIMIT 1 ";
                                                    $result1 = $db->query($query1);
                                                    $creneau = $result1->fetch_assoc();
                                                    echo $creneau['jour'] . " " . $creneau['heure'] . " " . $creneau['lieu'];

                                                    ?></td> -->
                                            <td>
                                                <fieldset class="px-2 ml-1 d-flex flex-column" id="radio_<?php echo $row['soutenance_id'] ?>">
                                                    <div>
                                                        <input class="form-check-input" type="radio" name="radio_<?php echo $row['soutenance_id'] ?>" value="1" onChange="getIfYesOrNon(this.value,<?php echo $row['soutenance_id'] ?>)" />
                                                        <label class="form-check-label"> Oui </label>
                                                    </div>
                                                    <span id="bla">
                                                        <!-- When the button is "NON" a Popup opens say the admin to put in
                         the form why he or she choose No "Description of the problem"  -->
                                                        <input class="form-check-input" type="radio" name="radio_<?php echo $row['soutenance_id'] ?>" value="2" onChange="getIfYesOrNon(this.value,<?php echo $row['soutenance_id'] ?>)" />
                                                        <label class="form-check-label"> Non </label></span>
                                                </fieldset>

                                            </td>
                                            <td>
                                                <div class="row" style="display: none">
                                                    <div class="mx-2">
                                                        <textarea id="motif_<?php echo $row['soutenance_id'] ?>" name="" class="form-control form-control-sm" placeholder=" le motif ou problème " required></textarea>
                                                    </div>
                                                </div>

                                            </td>
                                            <!-- <td>
                                                <a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-2 .item-<?php echo $row['soutenance_id'] ?>" class="btn btn-info rounded-circle" href="#accordion-2 .item-<?php echo $row['soutenance_id'] ?>"><i class="fa fa-caret-down"></i></a>
                                            </td> -->
                                            <td>
                                                <button class="btn btn-success btn-sm" onclick="enregister(<?php echo $row['soutenance_id'] ?>,<?php echo $row['etat'] ?>)">
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                    Enregistrer
                                                </button>
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
        $.ajax({
            type: "POST",
            url: "prof-process.php",
            data: data,
            success: function(data) {
                if (data.erreur === '') {
                    $("#row_" + data.id).remove();
                    if (data.etat === -3 || data.etat === 3) {
                        let badge = $("#bagde_directeur")
                        let n = parseInt(badge.text())
                        badge.text(+n - 1)
                    } else if (data.etat === -4 || data.etat === 4) {
                        let badge = $("#bagde_president")
                        let n = parseInt(badge.text())
                        badge.text(+n - 1)
                    }
                } else {
                    alert(data.erreur)

                }

            },
            dataType: 'json'
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