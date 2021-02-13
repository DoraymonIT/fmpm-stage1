<?php
require_once('session_manager.php');
require_once('service.php');

ob_start();


$id = prof_session();
$who = $_GET['option'];
if (isset($who)) {
    if ($who == 'directeur') {
        $result = get_soutenance_result(array('etat' => '2', 'directeur' => $id));
    } elseif ($who == 'president') {
        $result = get_soutenance_result(array('etat' => '3', 'president' => $id));
    } else {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}
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
                    <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                        Vous êtes connecté : <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> !</h6>
                    <p><a href="logout.php" class="btn btn-primary" role="button">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></p>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h5 class="crenau">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Tableau de
                        Confirmation de l'impression des thèses En tant que <?php echo $who ?>
                    </h5>
                </div>
            </div>


            <div class="tab-pane fade show active " id="directeur_tab" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="col-md-1">
                    <a class="btn btn-success btn-block btn-sm" href="choix_du_prof.php" role="button">
                             <i class="fa fa-caret-left" aria-hidden="true"></i> Retour</a>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-3"><a class="btn btn-success btn-block btn-sm" href="historique.php?who=1" role="button">
                             <i class="fa fa-history" aria-hidden="true"></i> Historique</a></div>
                </div>
                <div class="row">

                    <div class="col-md-12">

                        <br />
                        <?php get_table($result); ?>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
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

    var m = $(".menu-item");
    m.addClass('fa-caret-down');
    m.on('click', function() {
        if (m.hasClass('fa-caret-down')) {
            m
                .removeClass('fa-caret-down')
                .addClass('fa-caret-up');
        } else {
            m
                .removeClass('fa-caret-up')
                .addClass('fa-caret-down');
        }
    });

    function getIfYesOrNon(val, id) {
        row = document.querySelector('#row_' + id.toString())
        motif = row.childNodes[12]
        if (parseInt(val) === 2) {


            motif.childNodes[1].style.display = "block";

        } else {

            motif.childNodes[1].style.display = "none";
        }
    }
</script>

</html>