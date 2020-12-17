<?php
require_once('database_connect.php');
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.css">
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.date.css">
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.time.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Choix du Date de soutenance | Demande de soutenance de thèse</title>
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
            <div class="col-md-12 title">
                <h3><u>Espace Directeur | Validation de la date de soutenance .</u></h3>
                <?php if (isset($_SESSION['noProf'])) : ?>
                    <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                        Vous êtes Connecte : <?php echo $_SESSION['username'] ?> !</h6>
                    <p><a href="logout.php" class="btn btn-primary" role="button">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>
                <?php endif ?>
                <hr>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="crenau">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Tableau de
                        Confirmation du date de soutenance .
                    </h5>
                    <div class="row">
                        <div class="col-md-3"> <a class="btn btn-success btn-block btn-sm" href="historique.php?who=4" role="button">
                                <i class="fa fa-history" aria-hidden="true"></i> Historique</a> </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3"> </div>
                    </div>
                    <br />
                    <table class="table table-hover table-striped table-bordered myTable table-responsive-xl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Étudiant(e)</th>
                                <th>Sujet</th>
                                <th>Date de soutenance</th>
                                <th>L'Accord</th>
                                <th>Motif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody role="tablist" id="accordion-1">
                            <?php
                            if (mysqli_num_rows($result) == 0) {
                                echo '<tr><td colspan="9" class="text-center">Aucune soutenance trouvé</td></tr>';
                            }
                            while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr id="row_<?php echo $row['soutenance_id'] ?>" role="tab">
                                    <td>
                                        <a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-<?php echo $row['soutenance_id'] ?>" class="btn btn-info rounded-circle" href="#accordion-1 .item-<?php echo $row['soutenance_id'] ?>">
                                            <i class="fa menu-item"></i></a>
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
                                    <td>
                                        <?php
                                        $id = $row['id_these'];
                                        $these = "SELECT * FROM these WHERE id = '$id' ";
                                        $res = mysqli_query($db, $these);
                                        while ($row1 = $res->fetch_assoc()) {
                                            echo $row1['intitule'];
                                        } ?>
                                    </td>
                                    <td>
                                        <?php

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
                                        } ?>
                                    </td>
                                    <td> <?php echo $row['date_depot_sujet']; ?></td>
                                    <td>
                                      
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio_<?php echo $row['soutenance_id'] ?>" value="1" onChange="getIfYesOrNon(this.value,<?php echo $row['soutenance_id'] ?>)">
                                            <label class="form-check-label" for="inlineRadio1">Accordé</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <span id="bla">
                                                <input class="form-check-input" type="radio" name="radio_<?php echo $row['soutenance_id'] ?>" value="2" onChange="getIfYesOrNon(this.value,<?php echo $row['soutenance_id'] ?>)">
                                                <label class="form-check-label" for="inlineRadio2">Désaccordé</label></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row" style="display: none">
                                            <div class="mx-2">
                                                <textarea id="motif_<?php echo $row['soutenance_id'] ?>" name="" class="form-control form-control-sm" placeholder="le motif ou problème " required></textarea>
                                            </div>
                                        </div>

                                    </td>
                                    <!-- <td>
                                        <a data-toggle="collapse" aria-expanded="true"
                                         aria-controls="accordion-1 .item-<?php echo $row['soutenance_id'] ?>"
                                          class="btn btn-info rounded-circle" href="#accordion-1 .item-<?php echo $row['soutenance_id'] ?>">
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
                                                    <!-- <ul>
                                                        <li>
                                                            <h6> <?php

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
                                                                    } ?>
                                                        </li>
                                                    </ul> -->
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>


    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



</body>

</html>