<?php
require_once('database_connect.php');
ob_start();
session_start();
$query = "SELECT * FROM soutenance WHERE etat >= 4";
$result = mysqli_query($db, $query);
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
                        <div class="col-md-3"> <a class="btn btn-success btn-block btn-sm" href="#" role="button">
                                <i class="fa fa-history" aria-hidden="true"></i> Historique</a> </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3"> </div>
                    </div>
                    <br />
                    <table class="table table-hover table-striped table-bordered myTable table-responsive-xl">
                        <thead>
                            <tr>

                                <th>Étudiant(e)</th>
                                <th>CNE</th>
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
                                        <b>
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
                                        } ?></b>
                                    </td>

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
                                    <td>
                                        <button class="btn btn-success btn-sm" onclick="enregister(<?php echo $row['soutenance_id'] ?>,<?php echo $row['etat'] ?>)">
                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                            Enregistrer
                                        </button>
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
</body>

</html>