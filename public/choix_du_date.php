<?php
require_once('session_manager.php');
require_once('service.php');
ob_start();

$cne = etudiant_session();
$result = get_soutenance_result(array('etudiant'=>$cne));
if (mysqli_num_rows($result) == 0) {
    header('location: dem_soutenance.php');
} else {
    $soutenance = $result->fetch_assoc();
    if ($soutenance['etat'] != 4 && $soutenance['etat'] != 5) {
        header('location: etudiant.php');
    } else {
        $date = $soutenance['date_depot_sujet'];
        $date = date('Y-m-d', strtotime("+6 months", strtotime($date)));
        $today = date("Y-m-d ");

        if ($today <= $date) {
            header('location: etudiant.php');
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.css">
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.date.css">
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.time.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Choix du Date de soutenance | Demande de soutenance de thèse</title>
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
        <div class="col-md-12 title">
            <h3><u>Espace Étudiant</u></h3>
                <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                    Vous êtes Connecte : <?php echo $_SESSION['username'] ?> !</h6>
                <p><a href="logout.php" class="btn btn-primary" role="button">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></p>

            <hr>

        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="crenau">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> Choix du date du soutenance .
                </h5>
            </div>

        </div>
        <form action="crenaeu-process.php" method="post">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <br>
                    <label>Choisir un jour pour voir les horaires disponibles
                        <span>*</span></label>

                    <input class="datepicker form-control form-control-sm" type="date" name=""
                           placeholder='&#128197; Cliquez Ici pour Choisir un jour . &#x1f4c5;'
                           style="text-align: center;"
                           onChange="getCreneaux(this.value);" required/>

                    <br/>
                    <div class="row horaires" id="creneux">
                        <div class="col-md-12">
                            <label>Les créneaux disponibles :
                                <span>*</span></label>
                            <fieldset name="creneau_heure" id="cre-list">

                            </fieldset>
                        </div>
                    </div>

                    <hr>

                    <button type="submit" name="submit_creneau_date" class="btn btn-success btn-custom"><i
                                class="fa fa-check-square" aria-hidden="true"></i> Réserver
                    </button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="pickadate.js-3.6.2/lib/picker.js"></script>
<script src="pickadate.js-3.6.2/lib/picker.date.js"></script>
<script src="pickadate.js-3.6.2/lib/picker.time.js"></script>
<script>


    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }
    Date.prototype.subDays = function (days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() - days);
        return date;
    }
    $(document).ready(
        function () {
            var min_d = new Date().addDays(30)
            var min = min_d.getFullYear() + "-" + (+min_d.getMonth() + 1) + "-" + min_d.getDate();


            $.ajax({
                type: "POST",
                url: "test.php",
                data: {
                    'min-date': min
                },
                success: function (data) {
                    let dates = [true]
                    for (let i = 0; i < data.length; i++) {
                        dates.push(new Date(data[i]));
                    }
                    $('.datepicker').pickadate({
                        onClose: function () {
                            $("#creneux").fadeIn(2000);
                        },
                        disable: dates
                    });

                },
                error: function () {

                },
                dataType: 'json'
            });
        }
    )

    function getCreneaux(val) {
        var d = new Date(val)
        var dateF = d.getFullYear() + "-" + (+d.getMonth() + 1) + "-" + d.getDate();
        $.ajax({
            type: "POST",
            url: "crenaeu-process.php",
            data: 'date_ex=' + dateF,
            success: function (data) {
                $("#cre-list").html(data);
            }
        });
    }


</script>

</body>

</html>