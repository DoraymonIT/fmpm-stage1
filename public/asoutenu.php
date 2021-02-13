<?php
require_once('session_manager.php');
require_once('service.php');
ob_start();
administration_session();
$result = get_soutenance_result(array('etat' => '8'))
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>    <!-- <link rel="stylesheet" href="assets/css/mdb.min.css"> -->
    <link rel="stylesheet" href="style.css"/>
    <title>
        A soutenu
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

            <div class="col-md-12">
                <h5 class="crenau">
                    <i class="fa fa-list" aria-hidden="true"></i> Listes des soutenances valides | A soutenu
                </h5>
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-success btn-sm" href="acceuilAdministration.php" role="button">
                            <i class="fa fa-caret-left" aria-hidden="true"></i> Retour</a></div>
                    <div class="col-md-6"></div>
                    <div class="col-md-3"><a class="btn btn-success btn-block btn-sm" href="historique.php?who=7" role="button">
                             <i class="fa fa-history" aria-hidden="true"></i> Historique</a></div>
                </div>
                <br/>
                <?php get_table($result,false,true); ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
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

    function pdf(soutenance_id, type) {
        var link = document.createElement('a');
        link.href = 'pdf.php?id=' + soutenance_id + '&type=' + type;
        link.click();
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
            "accord": value,
            "etat": etat,
            "motif": motif

        };
        console.log(data)
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

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
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