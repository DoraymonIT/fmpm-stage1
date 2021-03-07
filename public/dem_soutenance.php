<?php
require_once('session_manager.php');
require_once('service.php');
ob_start();
$cne = etudiant_session();
if (soutenanceExistByEtudiant($cne)) {
    header('location: etudiant.php');
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
    <title>Demande de soutenance de thèse</title>
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
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align: center;">
            <h3><u>Espace Étudiant</u></h3>
            <?php if (isset($_SESSION['CNE'])) : ?>
                <p><a href="logout.php" class="btn btn-primary" role="button">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></p>
            <?php endif ?>
        </div>
        <div class="col-md-4"></div>

    </div>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 title">
                <h3><u>Demande de soutenance de thèse</u></h3>
                <p>
                    Remplissez soigneusement ce formulaire, toute information
                    <b> erronée</b> <br/>
                    peut annuler votre demande .

                </p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <hr/>
                <form action="soutenance_process.php" method="post">
                    <h5 class="crenau"><i class="fa fa-info-circle" aria-hidden="true"></i> Informations Principales
                    </h5>
                    <label>Nom et Prénom du thésard (e) : </label>
                    <br>
                    <h6 style="font-weight: bolder;color: teal;font-family: cursive;text-transform: uppercase;">

                        <?php if (isset($_SESSION['nom'])) : ?>

                            <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
                        <?php endif ?>

                        <br/></h6>

                    <br/>
                    <label>Intitulé de la thèse :</label>
                    <p>
                        <?php
                        $directeur=get_these_by_etudiant($cne)['directeur'];
                        echo get_these_by_etudiant($cne)['intitule'];
                        ?>
                    </p>
                    <input type="hidden" name="these" value="<?php echo get_these_by_etudiant($cne)['id'] ?>">
                    <input type="hidden" name="directeur" value="<?php echo $directeur?>">
                    <br/>
                    <label>Président du Jury<span>*</span></label>
                    <select class="form-control form-control-sm" name="president_these"
                            required>
                        <option value="" selected disabled>Président du Jury</option>
                        <?php
                        $prof = get_all_prof_except($directeur);
                        while ($row = $prof->fetch_assoc()) {

                            ?>
                            <option value="prof_<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <label>Membre 1 du Jury <span>*</span></label>
                    <select class="form-control form-control-sm" name="jury1" required>
                        <option value="" selected disabled>Membre 1 du Jury</option>
                        <?php
                        $prof = get_all_prof_except($directeur);
                        while ($row = $prof->fetch_assoc()) {

                            ?>
                            <option value="prof_<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <label>Membre 2 du Jury <span>*</span></label>
                    <select class="form-control form-control-sm" name="jury2" required>
                        <option value="" selected disabled>Membre 2 du Jury</option>
                        <?php
                        $prof = get_all_prof_except($directeur);
                        while ($row = $prof->fetch_assoc()) {

                            ?>
                            <option value="prof_<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <label>Membre 3 du Jury<span>*</span></label>
                    <select class="form-control form-control-sm" name="jury3" required>
                        <option value="" selected disabled>Membre 3 du Jury</option>
                        <?php
                        $prof = get_all_prof_except($directeur);
                        while ($row = $prof->fetch_assoc()) {

                            ?>
                            <option value="prof_<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <label>Membre 4 du Jury <span>*</span></label>
                    <select class="form-control form-control-sm" name="jury4" required>
                        <option value="" selected disabled>Membre 4 du Jury</option>
                        <?php
                        $prof = get_all_prof_except($directeur);
                        while ($row = $prof->fetch_assoc()) {

                            ?>
                            <option value="prof_<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <!-- <h5 class="crenau"><i class="fa fa-clock-o" aria-hidden="true"></i> Choix du Créneau</h5>
                    <br>
                    <label>Choisir un jour pour voir les horaires disponibles
                        <span>*</span></label>

                    <input class="datepicker form-control form-control-sm" type="date" name="" placeholder='&#128197; Cliquez Ici pour Choisir un jour . &#x1f4c5;' style="text-align: center;" onChange="getCreneaux(this.value);" required />

                    <br />
                    <div class="row horaires" id="creneux">
                        <div class="col-md-12">
                            <label>Les créneaux disponibles :
                                <span>*</span></label>
                            <fieldset name="creneau_heure" id="cre-list">

                            </fieldset>
                        </div>
                    </div> -->
                    <br>
                    <hr>
                    <br/>
                    <button type="submit" name="submit_soutenence" class="btn btn-success btn-custom"><i
                                class="fa fa-check-square" aria-hidden="true"></i> Confirmer
                    </button>
                    <br/>
                </form>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="pickadate.js-3.6.2/lib/picker.js"></script>
<script src="pickadate.js-3.6.2/lib/picker.date.js"></script>
<script src="pickadate.js-3.6.2/lib/picker.time.js"></script>
<script>

    const select = $('select');
    select.on('change', function (event) {
        var prevValue = $(this).data('previous');
        select.not(this).find('option[value="' + prevValue + '"]').show();


        var value = $(this).val();

        $(this).data('previous', value);
        select.not(this).find('option[value="' + value + '"]').hide();
    });


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

    // $('.datepicker').pickadate();
    $('.datepicker1').pickadate({
        max: new Date().subDays(150)
    })
</script>

</html>