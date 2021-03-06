<?php
require_once('../database_connect.php');
require_once('../session_manager.php');
ob_start();
$cne = etudiant_session();
$query = "SELECT * FROM these WHERE etudiant ='$cne' ";
$result = $db->query($query);
if (mysqli_num_rows($result) != 0) {
    header('location: etudiant.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../pickadate.js-3.6.2/lib/themes/default.css">
    <link rel="stylesheet" href="../pickadate.js-3.6.2/lib/themes/default.date.css">
    <link rel="stylesheet" href="../pickadate.js-3.6.2/lib/themes/default.time.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <title>thèse</title>
</head>

<body>
    <header class="backk">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img style="float: left" src="../assets/img/minstere.png" alt="Ministere LOGO" width="50%" />
                </div>
                <div class="col-md-6">
                    <img style="float: right" src="../assets/img/FMPM.png" alt="FMPM Logo" width="50%" />
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
                    <p><a href="../logout.php" class="btn btn-primary" role="button">
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
                    <h3><u>Thèse</u></h3>
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
                    <form action="these_process.php" method="post">
                        <h5 class="crenau"><i class="fa fa-info-circle" aria-hidden="true"></i> Informations Principales
                        </h5>
                        <label>Nom et Prénom du thésard (e) : </label>
                        <br>
                        <h6 style="font-weight: bolder;color: teal;font-family: cursive;text-transform: uppercase;">
                      
                            <?php if (isset($_SESSION['nom'])) : ?>

                                <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
                            <?php endif ?>

                            <br /></h6>
                        <br />

                        <label>Directeur de la thèse <span>*</span></label>
                        <select class="form-control form-control-sm" name="directeur_these"   required>
                            <option value="" selected disabled>Directeur de la thèse</option>
                            <?php
                            $directeur_these = "SELECT * FROM prof";
                            $result = mysqli_query($db, $directeur_these);
                            while ($row = $result->fetch_assoc()) {

                            ?>
                                <option value="prof_<?php echo $row['id'] ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                            <?php } ?>
                        </select>

                        <br />
                        <label>Intitulé de la thèse <span>*</span></label>
                        <input type="text" name="intitule" class="form-control form-control-sm" placeholder="Intitulé de la thèse" required />
                        <br />
                        <label>Nature de la thèse <span>*</span></label>
                        <input type="text" name="nature" class="form-control form-control-sm" placeholder="Nature de la thèse" required />
                        <br />
                        <label>Matériel d’étude et échantillonnage <span>*</span></label>
                        <input type="text" name="materiel_echan" class="form-control form-control-sm" placeholder="Matériel d’étude et échantillonnage" required />
                        <br />
                        <label> Durée de l’étude<span>*</span></label>
                        <input type="text" name="duree" class="form-control form-control-sm" placeholder="Durée de l’étude" required />
                        <br />
                        <label>Lieu de l’étude <span>*</span></label>
                        <input type="text" name="lieu" class="form-control form-control-sm" placeholder="Lieu de l’étude " required />
                        <br />
                        <label>Objectifs de l’étude (ne pas dépasser 2 lignes)
                            <span>*</span></label>
                        <textarea name="obj_etude" id="" cols="2" rows="2" class="form-control" placeholder="Objectifs de l’étude" required></textarea>
                        <br />
                        <label> Mots clés <span>*</span></label>
                        <input type="text" name="mots_cles" class="form-control form-control-sm" placeholder="Mots clés" required />
                        <small id="mot" class="form-text text-muted">Utilisez virgule <b>( , )</b> entre un mot et autre
                            .</small>

                        <span></span>
                        <br />

                        <br />
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
                        <br />
                        <button type="submit" name="submit_these" class="btn btn-success btn-custom"><i class="fa fa-check-square" aria-hidden="true"></i> Confirmer
                        </button>
                        <br />
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
<script src="../assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="pickadate.js-3.6.2/lib/picker.js"></script>
<script src="pickadate.js-3.6.2/lib/picker.date.js"></script>
<script src="pickadate.js-3.6.2/lib/picker.time.js"></script>
<script>

    const select=$('select');
    select.on('change', function(event ) {
        var prevValue = $(this).data('previous');
        select.not(this).find('option[value="'+prevValue+'"]').show();


        var value = $(this).val();

        $(this).data('previous',value);
        select.not(this).find('option[value="'+value+'"]').hide();
    });




</script>

</html>