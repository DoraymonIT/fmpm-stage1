<?php
require_once('database_connect.php');
require_once('session_manager.php');
ob_start();
prof_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- <link rel="stylesheet" href="assets/css/mdb.min.css"> -->
    <link rel="stylesheet" href="style.css" />
    <title>Choix du Prof | L'accord des thèses de soutenance </title>
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
                    <h3><u>Espace Prof</u></h3>

                    <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                        Vous êtes Connecté : <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> !</h6>
                    <p><a href="logout.php" class="btn btn-primary" role="button">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></p>

                    <hr>
                </div>
            </div>
            <div class="row text-center" style="padding-top: 20px;">
                <div class="col-md-4">
                    <div class="choix_prof">
                        <a href="prof.php?option=directeur"> <i class="fa fa-print" aria-hidden="true"></i> <br>
                            Accord d'impression des thèses <i class="fa fa-caret-right" aria-hidden="true"></i> Directeur</a>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choix_prof"><a href="prof.php?option=president">
                            <i class="fa fa-print" aria-hidden="true"></i><br> Accord d'impression des thèses <i class="fa fa-caret-right" aria-hidden="true"></i>
                            Président</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choix_prof"><a href="confirmation_date.php"> <i class="fa fa-calendar" aria-hidden="true"></i><br>
                            Accord sur la date de
                            soutenance .</a></div>
                </div>


            </div>
        </div>
    </section>
    <div style="padding-top: 200px;">
        <hr />
        <footer>
            <p>
                Service de scolarité de FMPM
                <i class="fa fa-copyright" aria-hidden="true"></i> 2020
            </p>
        </footer>
    </div>
</body>
<script src="assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</html>