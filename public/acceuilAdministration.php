<?php
require_once('database_connect.php');
require_once('session_manager.php');
ob_start();
administration_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- <link rel="stylesheet" href="assets/css/mdb.min.css"> -->
    <link rel="stylesheet" href="style.css"/>
    <title>Acceuil Administration </title>
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
                <h3><u>Espace Administration</u></h3>

                <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                    Vous êtes Connecté : <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> !</h6>
                <p><a href="logout.php" class="btn btn-primary" role="button">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>

                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 m-auto d-flex flex-column text-center ">
                <a href="administration.php"> <i class="fa fa-print" aria-hidden="true"></i>Validation des relevés de
                    notes
                    et cliniques</a>
                <a href="soutenances.php"> <i class="fa fa-print" aria-hidden="true"></i> validation finale
                    des demandes de soutenances</a>
                <a href="asoutenu.php"> <i class="fa fa-calendar" aria-hidden="true"></i> a soutenu?</a>
                <!-- <a href="#">bla bla bla bla bla bla bla bla</a>
            <a href="#">bla bla bla bla bla bla bla bla</a>
            <a href="#">bla bla bla bla bla bla bla bla</a>
            <a href="#">bla bla bla bla bla bla bla bla</a>
            <a href="#">bla bla bla bla bla bla bla bla</a> -->
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


</html>