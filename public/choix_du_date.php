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
                <h3><u>Espace Étudiant</u></h3>
                <?php if (isset($_SESSION['CNE'])) : ?>
                    <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                        Vous êtes Connecte : <?php echo $_SESSION['username'] ?> !</h6>
                    <p><a href="logout.php" class="btn btn-primary" role="button">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>
                <?php endif ?>
                <hr>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5 class="crenau">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Choix du date du soutenance .
                    </h5>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
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
                    </div>

                    <hr>

                    <button type="submit" name="submit_creneau_date" class="btn btn-success btn-custom"><i class="fa fa-check-square" aria-hidden="true"></i> Confirmer
                    </button>
                </div>
                <div class="col-md-4"></div>
            </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="pickadate.js-3.6.2/lib/picker.js"></script>
    <script src="pickadate.js-3.6.2/lib/picker.date.js"></script>
    <script src="pickadate.js-3.6.2/lib/picker.time.js"></script>
    <script>
        function profSelect(val) {
            const selects = document.querySelectorAll("select");
            const values = [];
            for (let i = 0; i < 6; i++) {
                if (selects[i].value !== '') {
                    values.push(parseInt(selects[i].value))
                }
            }

            for (let i = 1; i < val.options.length; i++) {

                if (values.includes(parseInt(val.options[i].value))) {
                    val.options[i].hidden = true;
                } else val.options[i].hidden = false;
            }

        }

        Date.prototype.addDays = function(days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        }
        Date.prototype.subDays = function(days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() - days);
            return date;
        }
        $(document).ready(
            function() {
                var min_d = new Date().addDays(30)
                var min = min_d.getFullYear() + "-" + (+min_d.getMonth() + 1) + "-" + min_d.getDate();


                $.ajax({
                    type: "POST",
                    url: "test.php",
                    data: {
                        'min-date': min
                    },
                    success: function(data) {
                        let dates = [true]
                        for (let i = 0; i < data.length; i++) {
                            dates.push(new Date(data[i]));
                        }
                        $('.datepicker').pickadate({
                            onClose: function() {
                                $("#creneux").fadeIn(2000);
                            },
                            disable: dates
                        });

                    },
                    error: function() {

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
                success: function(data) {
                    $("#cre-list").html(data);
                }
            });
        }

        // $('.datepicker').pickadate();
        $('.datepicker1').pickadate({
            max: new Date().subDays(180)
        })
    </script>

</body>

</html>