<?php
require_once('database_connect.php');
ob_start();
session_start();
if (empty($_SESSION['num'])) {
    header('location: loginDuThese.php');
}
$query = "SELECT * FROM soutenance ";
$result = mysqli_query($db, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Interface de l'administration | Voir le progresse de demande de thèse .</title>
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
                    <h3><u>Espace Comité du thèse </u></h3>
                    <?php if (isset($_SESSION['num'])) : ?>
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
                        <i class="fa fa-history" aria-hidden="true"></i> Historique
                    </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-success btn-sm" href="comite_these.php" role="button">
                                <i class="fa fa-caret-left" aria-hidden="true"></i> Retour</a> </div>
                        <div class="col-md-8"></div>
                    </div>
                    <br />
                    <table class="table table-hover table-striped table-bordered myTable table-responsive-xl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Étudiant(e)</th>
                                <th>CNE</th>
                                <!-- <th>Numéro Apogée</th> -->
                                <th>Sujet</th>
                                <th>Date de dépôt de sujet</th>
                                <th>L'Accord</th>
                                <th>Motif</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) == 0) {
                                echo '<tr><td colspan="8" class="text-center">Aucun soutenance trouvé </td></tr>';
                            }
                            while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr id="row_<?php echo $row['soutenance_id'] ?>">
                                    <td>
                                        <?php echo $row['soutenance_id']; ?>
                                        <!--                    <button data-toggle="tooltip" data-placement="left" data-html="true" title="Cliquez Ici pour <b> les relevés de notes</b> et <b>les stages</b> et<b> les cliniques</b> de cet étudiant avant de confirmer <b>la validation .</b>" class="btn btn-sm btn-info">-->
                                        <!--                      <i class="fa fa-info-circle" aria-hidden="true"></i>-->
                                        <!--                    </button>-->
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
                                    <td> <?php echo $row['date_depot_sujet']; ?></td>
                                    <td>
                                        <?php if ($row['etat'] == 2) {
                                            echo "OUI";
                                        } else if ($row['etat'] == -2) {
                                            echo "NON";
                                        } else {
                                            echo "En cours de traitement ...";
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <?php echo $row['motif'] ?>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    function getIfYesOrNon(val, id) {
        row = document.querySelector('#row_' + id.toString())
        motif = row.childNodes[13]
        if (parseInt(val) === 2) {


            motif.childNodes[1].style.display = "block";

        } else {

            motif.childNodes[1].style.display = "none";
        }
    }

    function enregister(row_id) {
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
            "accord": value,
            "motif": motif

        };
        console.log(data)
        $.ajax({
            type: "POST",
            url: "administration-process.php",
            data: data,
            success: function(id) {
                $("#row_" + id).remove();

            },
            dataType: 'text'
        });

    }

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</html>