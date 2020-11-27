<?php
require_once('database_connect.php');
ob_start();
session_start();
if (empty($_SESSION['CNE'])) {
    header('location: index.php');
}
$cne = $_SESSION['CNE'];
$query = "SELECT * FROM soutenance WHERE etudiant ='$cne' LIMIT 1 ";
$result = $db->query($query);
if (mysqli_num_rows($result) == 0) {
    header('location: dem_soutenance.php');
} else {
    $soutenance = $result->fetch_assoc();
    if ($soutenance['etat'] == -1) {
        $id = $soutenance['soutenance_id'];
        $sql = $db->query("UPDATE soutenance SET etat = 0 WHERE soutenance_id = $id");
        if ($sql) {
            header('location: etudiant.php');
            $_SESSION['succes_activation'] = "Votre demande a été réactiver avec succès";
        } else {
            echo "Erreur";
        }
    } elseif ($soutenance['etat'] < -1) {
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
            <title>Demande de soutenance de thèse</title>
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
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-3" style="text-align: center;" >
                        <h3 ><u>Espace Étudiant</u></h3>
                        <?php if (isset($_SESSION['CNE'])) : ?>
                            <p><a href="logout.php" class="btn btn-primary" role="button">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>
                        <?php endif ?>
                    </div>
                     <div class="col-md-9"></div>
                </div>
            </div>
            <section>
                <div class="container">
                    <div class="row">
                  
                        <div class="col-md-12 title">  <hr>
                            <h3><u>Demande de soutenance de thèse</u></h3>
                            <p>
                                Remplissez soigneusement ce formulaire, toute information
                                <b> erronée</b> <br />
                                peut annuler votre demande .

                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <hr />
                            <form action="soutenance_process.php" id="my_form" method="post">
                                <h5 class="crenau"><i class="fa fa-info-circle" aria-hidden="true"></i> Informations Principales
                                </h5>
                                <label>Nom et Prénom du thésard (e) : </label>
                                <br>
                                <h6 style="  font-weight: 800;">
                                    <?php if (isset($_SESSION['nom'])) : ?>

                                        <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
                                    <?php endif ?>

                                    <br /></h6>
                                <br />
                                <label>Date de dépôt du sujet <span>*</span></label>
                                <!--                            <span class="form-control form-control-sm">--><?php //echo $soutenance['date_depot_sujet']
                                                                                                                ?>
                                <!--</span>--><input type="hidden" name="soutenance_id" value="<?php echo $soutenance['soutenance_id'] ?>" />
                                <input class="datepicker1 form-control form-control-sm" type="date" placeholder='&#128197; Cliquez Ici pour Choisir un jour . &#x1f4c5;' style="text-align: center;" name="date_depot_sujet" value="<?php echo $soutenance['date_depot_sujet'] ?>" disabled required />
                                <br />
                                <label>Directeur de la thèse <span>*</span></label>
                                <select class="form-control form-control-sm" name="directeur_these" onclick="profSelect(this)" <?php if ($soutenance['etat'] < -2) echo "disabled"; ?> required>

                                    <?php
                                    $directeur_these = "SELECT * FROM prof";
                                    $result = mysqli_query($db, $directeur_these);
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <option <?php if ($soutenance['directeur'] == $row['id']) echo "selected"; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                                    <?php } ?>
                                </select>

                                <br />
                                <label>Intitulé de la thèse <span>*</span></label>
                                <input type="text" name="intitule" class="form-control form-control-sm" placeholder="Intitulé de la thèse" value="<?php echo $soutenance['intitule_these'] ?>" required />
                                <br />
                                <label>Nature de la thèse <span>*</span></label>
                                <input type="text" name="nature" class="form-control form-control-sm" placeholder="Nature de la thèse" value="<?php echo $soutenance['nature_these'] ?>" required />
                                <br />
                                <label>Matériel d’étude et échantillonnage <span>*</span></label>
                                <input type="text" name="materiel_echan" class="form-control form-control-sm" placeholder="Matériel d’étude et échantillonnage" value="<?php echo $soutenance['materiel_d_etude_et_echantillioannage'] ?>" required />
                                <br />
                                <label> Durée de l’étude<span>*</span></label>
                                <input type="text" name="duree" class="form-control form-control-sm" placeholder="Durée de l’étude" value="<?php echo $soutenance['duree_d_etude'] ?>" required />
                                <br />
                                <label>Lieu de l’étude <span>*</span></label>
                                <input type="text" name="lieu" class="form-control form-control-sm" placeholder="Lieu de l’étude " value="<?php echo $soutenance['lieu_d_etude'] ?>" required />
                                <br />
                                <label>Objectifs de l’étude (ne pas dépasser 2 lignes)
                                    <span>*</span></label>
                                <textarea name="obj_etude" id="" cols="2" rows="2" class="form-control" placeholder="Objectifs de l’étude" required><?php echo $soutenance['objectif_d_etude'] ?></textarea>
                                <br />
                                <label> Mots clés <span>*</span></label>
                                <input type="text" name="mots_cles" class="form-control form-control-sm" placeholder="Mots clés" value="<?php echo $soutenance['mots_cles'] ?>" required />
                                <small id="mot" class="form-text text-muted">Utilisez virgule <b>( , )</b> entre un mot et autre
                                    .</small>

                                <span></span>
                                <br />
                                <label>Président du Jury<span>*</span></label>
                                <select class="form-control form-control-sm" name="president_these" onclick="profSelect(this)" <?php if ($soutenance['etat'] < -3) echo "disabled"; ?> required>

                                    <?php
                                    $president_these = "SELECT * FROM prof";
                                    $result = mysqli_query($db, $president_these);
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <option <?php if ($soutenance['president'] == $row['id']) echo "selected"; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                                    <?php } ?>
                                </select>
                                <br />
                                <label>Membre 1 du Jury <span>*</span></label>
                                <select class="form-control form-control-sm" name="jury1" onclick="profSelect(this)" required>

                                    <?php
                                    $jury1 = "SELECT * FROM prof";
                                    $result = mysqli_query($db, $jury1);
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <option <?php if ($soutenance['jury1'] == $row['id']) echo "selected"; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                                    <?php } ?>
                                </select>
                                <br />
                                <label>Membre 2 du Jury <span>*</span></label>
                                <select class="form-control form-control-sm" name="jury2" onclick="profSelect(this)" required>

                                    <?php
                                    $jury2 = "SELECT * FROM prof";
                                    $result = mysqli_query($db, $jury2);
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <option <?php if ($soutenance['jury2'] == $row['id']) echo "selected"; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                                    <?php } ?>
                                </select>
                                <br />
                                <label>Membre 3 du Jury<span>*</span></label>
                                <select class="form-control form-control-sm" name="jury3" onclick="profSelect(this)" required>

                                    <?php
                                    $jury3 = "SELECT * FROM prof";
                                    $result = mysqli_query($db, $jury3);
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <option <?php if ($soutenance['jury3'] == $row['id']) echo "selected"; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                                    <?php } ?>
                                </select>
                                <br />
                                <label>Membre 4 du Jury <span>*</span></label>
                                <select class="form-control form-control-sm" name="jury4" onclick="profSelect(this)" required>

                                    <?php
                                    $jury4 = "SELECT * FROM prof";
                                    $result = mysqli_query($db, $jury4);
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <option <?php if ($soutenance['jury4'] == $row['id']) echo "selected"; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                                    <?php } ?>
                                </select>
                                <br />
                                <h5 class="crenau"><i class="fa fa-clock-o" aria-hidden="true"></i> Choix du Créneau</h5>
                                <br>
                                <?php
                                $creneau_id = $soutenance['creneau'];
                                $q_creneau = "SELECT * FROM creneau where id=$creneau_id";
                                $result = mysqli_query($db, $q_creneau);
                                $creneau = $result->fetch_assoc()
                                ?>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="creneau_change" class="custom-control-input" id="customSwitches">
                                    <label class="custom-control-label" for="customSwitches">Changer votre creneau choisi ?</label>
                                </div>
                                <div id="changement_creneau" style="display: none">
                                    <br>
                                    <label>Choisir un jour pour voir les horaires disponibles
                                        <span>*</span></label>
                                    <input class="datepicker form-control form-control-sm" type="date" name="" placeholder='&#128197; Cliquez Ici pour Choisir un jour . &#x1f4c5;' style="text-align: center;" required />

                                    <br />
                                    <div class="row horaires" id="creneux">
                                        <div class="col-md-12">
                                            <label>Les créneaux disponibles :
                                                <span>*</span></label>
                                            <select name="creneau_heure" id="cre-list" class="form-control form-control-sm" required>
                                            </select></div>
                                    </div>
                                </div>

                                <br>
                                <hr>
                                <br />
                                <button type="submit" name="submit_edit_soutenance" class="btn btn-success btn-custom"><i class="fa fa-check-square" aria-hidden="true"></i> Confirmer
                                </button>
                                <br />
                            </form>

                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>

            </section>
        </body>
        <script src="assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                                onSet: function(context) {
                                    if (context.select) {
                                        var date = new Date(context.select)
                                        var date_f = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
                                        getCreneaux(date_f)
                                        $("#creneux").fadeIn(2000);
                                    }
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
                $.ajax({
                    type: "POST",
                    url: "crenaeu-process.php",
                    data: 'date_ex=' + val,
                    success: function(data) {
                        $("#cre-list").html(data);
                    }
                });
            }


            $("#customSwitches").change(
                function() {
                    // console.log($("#my_form").serialize())
                    if (this.checked) {
                        $("#changement_creneau")[0].style.display = "block";
                    } else {
                        $("#changement_creneau")[0].style.display = "none";
                    }
                }
            )
        </script>

        </html>


<?php

    } else {
        header('location: etudiant.php');
    }
}
