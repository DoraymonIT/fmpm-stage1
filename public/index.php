<?php
require_once('database_connect.php');
ob_start();
session_start();
if (empty($_SESSION['CNE'])) {
    header('location: loginDuThese.php');
}
$cne=$_SESSION['CNE'];
$query = "SELECT * FROM soutenance WHERE etudiant ='$cne' ";
$result = mysqli_query($db, $query);
if  (mysqli_num_rows($result) != 0) {
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

<body >
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
                <form action="" method="post">
                    <h5 class="crenau"><i class="fa fa-info-circle" aria-hidden="true"></i> Informations Principales
                    </h5>
                    <label>Nom et Prénom du thésard (e) : </label>
                    <br>
                    <h6 style="  font-weight: 800;">
                        <?php if (isset($_SESSION['nom'])) : ?>

                            <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
                        <?php endif ?>

                        <br/></h6>
                    <br/>
                    <label>Date de dépôt du sujet <span>*</span></label>
                    <input class="datepicker1 form-control form-control-sm" type="date" name="" id="" required/>
                    <br/>
                    <label>Directeur de la thèse <span>*</span></label>
                    <select class="form-control form-control-sm" required>
                        <option value="">Directeur de la thèse</option>
                        <?php
                        $directeur_these = "SELECT * FROM prof";
                        $result = mysqli_query($db, $directeur_these);
                        while ($row = $result->fetch_assoc()) {

                            ?>
                            <option value="<?php echo $row['nom'] . " " . $row['prenom']; ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                        <?php } ?>
                    </select>

                    <br/>
                    <label>Intitulé de la thèse <span>*</span></label>
                    <input type="text" name="" class="form-control form-control-sm" placeholder="Intitulé de la thèse"
                           required/>
                    <br/>
                    <label>Nature de la thèse <span>*</span></label>
                    <input type="text" name="" class="form-control form-control-sm" placeholder="Nature de la thèse"
                           required/>
                    <br/>
                    <label>Matériel d’étude et échantillonnage <span>*</span></label>
                    <input type="text" name="" class="form-control form-control-sm"
                           placeholder="Matériel d’étude et échantillonnage" required/>
                    <br/>
                    <label> Durée de l’étude<span>*</span></label>
                    <input type="text" name="" class="form-control form-control-sm" placeholder="Durée de l’étude"
                           required/>
                    <br/>
                    <label>Lieu de l’étude <span>*</span></label>
                    <input type="text" name="" class="form-control form-control-sm" placeholder="Lieu de l’étude "
                           required/>
                    <br/>
                    <label>Objectifs de l’étude (ne pas dépasser 2 lignes)
                        <span>*</span></label>
                    <textarea name="" id="" cols="2" rows="2" class="form-control" placeholder="Objectifs de l’étude"
                              required></textarea>
                    <br/>
                    <label> Mots clés <span>*</span></label>
                    <input type="text" name="" class="form-control form-control-sm" placeholder="Mots clés" required/>
                    <small id="mot" class="form-text text-muted">Utilisez virgule <b>( , )</b> entre un mot et autre
                        .</small>

                    <span></span>
                    <br/>
                    <label>Président du Jury<span>*</span></label>
                    <select class="form-control form-control-sm" required>
                        <option>Président du Jury</option>
                        <option>Prof 1</option>
                        <option>Prof 2</option>
                        <option>Prof 3</option>
                    </select>
                    <br/>
                    <label>Membre 1 du Jury <span>*</span></label>
                    <select class="form-control form-control-sm" required>
                        <option>Membre 1 du Jury</option>
                        <option>Prof 1</option>
                        <option>Prof 2</option>
                        <option>Prof 3</option>
                    </select>
                    <br/>
                    <label>Membre 2 du Jury <span>*</span></label>
                    <select class="form-control form-control-sm" required>
                        <option>Membre 2 du Jury</option>
                        <option>Prof 1</option>
                        <option>Prof 2</option>
                        <option>Prof 3</option>
                    </select>
                    <br/>
                    <label>Membre 3 du Jury<span>*</span></label>
                    <select class="form-control form-control-sm" required>
                        <option>Membre 3 du Jury</option>
                        <option>Prof 1</option>
                        <option>Prof 2</option>
                        <option>Prof 3</option>
                    </select>
                    <br/>
                    <label>Membre 4 du Jury <span>*</span></label>
                    <select class="form-control form-control-sm" required>
                        <option>Membre 4 du Jury</option>
                        <option>Prof 1</option>
                        <option>Prof 2</option>
                        <option>Prof 3</option>
                    </select>
                    <br/>
                    <h5 class="crenau"><i class="fa fa-clock-o" aria-hidden="true"></i> Choix du Créneau</h5>
                    <br>
                    <label>Choisir un jour pour voir les horaires disponibles
                        <span>*</span></label>

                    <input class="datepicker form-control form-control-sm" type="date" name="" id=""
                           placeholder='&#128197; Cliquez Ici pour Choisir un jour . &#x1f4c5;'
                           style="text-align: center;" required  onChange="getCreneaux(this.value);"/>

                    <br/>
                    <div class="row horaires" id="creneux">
                        <div class="col-md-12">
                            <label>Les créneaux disponibles :
                                <span>*</span></label>
                            <select name="" id="cre-list" class="form-control form-control-sm">
                            </select></div>
                    </div>
                    <br>
                    <hr>
                    <br/>
                    <button type="submit" class="btn btn-success btn-custom"><i class="fa fa-check-square"
                                                                                aria-hidden="true"></i> Confirmer
                    </button>
                    <br/>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
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
            var min_d=new Date().addDays(15)
            var max_d=new Date().addDays(45)
            var min=min_d.getFullYear()+"-"+(+min_d.getMonth()+1)+"-"+min_d.getDate();
            var max=max_d.getFullYear()+"-"+(+max_d.getMonth()+1)+"-"+max_d.getDate();


            $.ajax({
                type: "POST",
                url: "test.php",
                data: {
                    'min-date': min,
                    'max-date':max
                },
                success: function(data) {
                    let dates=[true]
                    for (let i = 0; i < data.length; i++) {
                        dates.push(new Date(data[i]));
                    }
                    $('.datepicker').pickadate({
                        onClose: function () {
                            $("#creneux").fadeIn(2000);
                        },disable:dates
                    });

                },error:function (){

                },
                dataType:'json'
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


    $('.datepicker1').pickadate({
        max: new Date().subDays(180)
    })
</script>

</html>