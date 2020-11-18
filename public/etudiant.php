<?php
require_once('database_connect.php');
ob_start();
session_start();
if (empty($_SESSION['CNE'])) {
    header('location: loginDuThese.php');
}
$cne = $_SESSION['CNE'];
$query = "SELECT * FROM soutenance WHERE etudiant ='$cne' LIMIT 1 ";
$result = $db->query($query);
if (mysqli_num_rows($result) == 0) {
    header('location: index.php');
} else {
    $soutenance = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>
        Accueil de l'étudiant | Voir le progresse de demande de thèse .
    </title>
    <style>
        table,
        th,
        td {
            border: 2px solid teal;
            text-align: center;
            padding: 5px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
<header class="backk">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img style="float: left" src="assets/img/minstere.png" alt="Ministere LOGO" width="50%"/>
            </div>
            <div class="col-md-6">
                <img style="float: right" src="assets/img/FMPM.png" alt="FMPM Logo" width="50%"/>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-12 title">
            <h3><u>Espace Etudiant</u></h3>
            <?php if (isset($_SESSION['CNE'])) : ?>
                <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                    Vous êtes Connecte : <?php echo $_SESSION['username'] ?> !</h6>
                <p><a href="logout.php" class="btn btn-primary" role="button">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>
            <?php endif ?>
            <hr>

        </div>
    </div>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5 class="crenau">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Informations
                    Principales
                </h5>
                <br>
                <b> Nom Prenom :</b>
                <?php if (isset($_SESSION['nom'])) : ?>
                    <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
                <?php endif ?>
                <br/>
                <b> CNE:</b>
                <?php if (isset($_SESSION['nom'])) : ?>
                    <?php echo $_SESSION['CNE'] ?>
                <?php endif ?>
                <hr>
                <b> <u> Accord du Jury </u> <br/>
                    <table style="width:100%">
                        <tr>
                            <th>Jury</th>
                            <th>Accord</th>
                        </tr>
                        <tr>
                            <td>L'administration</td>
                            <?php

                            if ($soutenance['etat'] >= 1 || $soutenance['etat'] < -1 ) {
                                echo '<td><i class="fa fa-check-square" aria-hidden="true"></i> Validé . </td>';
                            } elseif ($soutenance['etat'] == 0) {
                                echo '<td> <i class="fa fa-spinner" aria-hidden="true"></i> état en cours .</td>';
                            } elseif ($soutenance['etat'] == -1) {
                                echo '<td><i class="fa fa-times" aria-hidden="true"></i> Rejeté . </td>';
                            }
                            ?>

                        </tr>
                        <?php

                        if ($soutenance['etat'] >= 1 || $soutenance['etat'] == -2) {
                            echo '<tr><td>directeur</td>';
                            if ($soutenance['etat'] >= 2) {
                                echo '<td><i class="fa fa-check-square" aria-hidden="true"></i> Validé . </td>';
                            } elseif ($soutenance['etat'] == 1) {
                                echo '<td> <i class="fa fa-spinner" aria-hidden="true"></i> état en cours .</td>';
                            } elseif ($soutenance['etat'] <= -2) {
                                echo '<td><i class="fa fa-times" aria-hidden="true"></i> Rejeté . </td>';
                            }
                            echo '</tr>';


                        }
                        if ($soutenance['etat'] >= 2 || $soutenance['etat'] == -3) {
                            echo '<tr><td>Président de jury</td>';
                            if ($soutenance['etat'] >= 3) {
                                echo '<td><i class="fa fa-check-square" aria-hidden="true"></i> Validé . </td>';
                            } elseif ($soutenance['etat'] == 2) {
                                echo '<td> <i class="fa fa-spinner" aria-hidden="true"></i> état en cours .</td>';
                            } elseif ($soutenance['etat'] <= -3) {
                                echo '<td><i class="fa fa-times" aria-hidden="true"></i> Rejeté . </td>';
                            }
                            echo '</tr>';


                        }
                        ?>


                    </table>
                    <?php
                        if ($soutenance['etat'] <= -1){
                            echo '<br><p>MOTIF : '.$soutenance['motif'].'</p>';
                        }
                    ?>


                    <hr />
                    <h5 class="crenau">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Choix du Créneau
                    </h5>
                    <br />
                    <?php

                        $id = $soutenance['creneau'];
                        $creneau = "SELECT * FROM creneau WHERE id ='$id' ";
                        $result1 = mysqli_query($db, $creneau);
                        while ($row1 = $result1->fetch_assoc()) {
                            ?>
                            <i class="fa fa-calendar" aria-hidden="true"></i> <u> Votre date choisie</u> :
                            <b> <?php
                                echo $row1['jour'] . " : " . date('H:i', strtotime($row1['heure']));;

                                ?> </b>
                            <br> <u><i class="fa fa-location-arrow" aria-hidden="true"></i> Lieu</u> :
                            <b>
                            <?php
                            echo $row1['lieu'];
                        } ?>
                        </b>
                        <br>
                        <br>
                        <!-- Here , i dont know , i just improvised -->
                        <?php
                        if ($soutenance['etat'] != 0) {
                            ?> <a href="index.php"><button class="btn btn-success btn-custom"> <i class="fa fa-pencil" aria-hidden="true"></i> Changer le créneau</button></a>
                            <?php
                        }

                        ?>


            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
<hr/>
<footer>
    <p>
        Service de scolarité de FMPM
        <i class="fa fa-copyright" aria-hidden="true"></i> 2020
    </p>
</footer>
</body>
<script src="assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</html>