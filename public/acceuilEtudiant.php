<?php

require_once('session_manager.php');
require_once('service.php');
ob_start();


$cne = etudiant_session();
$result = get_soutenance_result(array('etudiant'=>$cne));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

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
<section>
    <div class="container">
        <div class="col-md-12 title">
            <h3><u>Espace Étudiant</u></h3>
            <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                Vous êtes connecté : <?php echo $_SESSION['username'] ?> !</h6>
            <p><a href="logout.php" class="btn btn-primary" role="button">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></p>

            <hr>

        </div>
        <div class="row">
            <div class="col-md-6 m-auto d-flex flex-column text-center ">
                <!-- <a href="#">bla bla bla bla bla bla bla bla</a>
            <a href="#">bla bla bla bla bla bla bla bla</a>
            <a href="#">bla bla bla bla bla bla bla bla</a>
            <a href="#">bla bla bla bla bla bla bla bla</a>
            <a href="#">bla bla bla bla bla bla bla bla</a> -->
                <?php
                if (mysqli_num_rows($result) == 0) {
                    echo "<a  href='dem_soutenance.php'> <i class='fa fa-plus' ></i> Créer une demande de soutenance . </a>";
                } else {
                    echo "<a  href='etudiant.php'> <i class='fa fa-eye' ></i> Voir le progresse de demande de soutenance . </a>";
                }

                ?>
            </div>
        </div>
    </div>
</section>
<hr>
<footer>
        <p>
            Service de scolarité de FMPM
            <i class="fa fa-copyright" aria-hidden="true"></i> 2020
        </p>
    </footer>
</body>

</html>