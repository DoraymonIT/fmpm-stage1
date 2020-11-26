<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />

    <title>
        Accueil du comite du thèse | Voir le progresse de demande de thèse .
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
                    <h3><u>Espace Comité du thèse </u></h3>
                    <?php if (isset($_SESSION['noProf'])) : ?>
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
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Tableau de ...
                    </h5>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3"> <a class="btn btn-success btn-block btn-sm" href="historique_comite.php" role="button">
                             <i class="fa fa-history" aria-hidden="true"></i> Historique</a> </div>
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
                                <th>Date choisi</th>
                                <th>L'Accord</th>
                                <th>Motif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td> </td>
                                <td></td>
                                <td>
                                    <fieldset class="px-2 ml-1 d-flex flex-column" id="radio_1">
                                        <div>
                                            <input class="form-check-input" type="radio" name="radio_1" value="1" onChange="getIfYesOrNon(this.value,<?php echo $row['soutenance_id'] ?>)" />
                                            <label class="form-check-label"> Oui </label>
                                        </div>
                                        <span id="bla">
                                            <input class="form-check-input" type="radio" name="radio_1" value="2" />
                                            <label class="form-check-label"> Non </label></span>
                                    </fieldset>
                                </td>
                                <td>
                                    <div class="row" style="display: none">
                                        <div class="mx-2">
                                            <textarea name="" class="form-control form-control-sm" placeholder=" Merci de nous dire le motif ou problème de dire NON" required></textarea>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                        Enregistrer
                                    </button>
                                </td>
                            </tr>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>