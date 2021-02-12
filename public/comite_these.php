<?php
require_once('service.php');
require_once('session_manager.php');
ob_start();
comite_session();
$result = get_soutenance_result(array('etat' => '1'));
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
        Accueil du comite du thèse | Voir le progresse de demande de thèse .
    </title>
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
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 title">
                <h3><u>Espace Comité du thèse | Validation du membres de jury .</u></h3>
                <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                    Vous êtes Connecté : <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> !</h6>
                <p><a href="logout.php" class="btn btn-primary" role="button">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>

                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"><a class="btn btn-success btn-block btn-sm" href="historique.php?who=4"
                                             role="button">
                            <i class="fa fa-history" aria-hidden="true"></i> Historique</a></div>
                    <div class="col-md-6"></div>

                </div>
                <br/>

                <?php get_table($result); ?>
            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    function getIfYesOrNon(val, id) {
        row = document.querySelector('#row_' + id.toString())
        motif = row.childNodes[12]
        if (parseInt(val) === 2) {


            motif.childNodes[1].style.display = "block";

        } else {

            motif.childNodes[1].style.display = "none";
        }
    }

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
            success: function (data) {
                if (data.erreur === '') {
                    $("#row_" + data.id).remove();

                } else {
                    alert(data.erreur)

                }

            },
            dataType: 'json'
        });

    }

    var m = $(".menu-item");
    m.addClass('fa-caret-down');
    m.on('click', function () {
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
</script>

</html>