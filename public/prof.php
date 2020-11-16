<?php
require_once('database_connect.php');
ob_start();
session_start();
if (empty($_SESSION['noProf'])) {
    header('location: loginDuThese.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>
      Accueil du professeurs | Voir le progresse de demande de thèse .
    </title>
  </head>
  <body>
    <header class="backk">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img
              style="float: left"
              src="assets/img/minstere.png"
              alt="Ministere LOGO"
              width="50%"
            />
          </div>
          <div class="col-md-6">
            <img
              style="float: right"
              src="assets/img/FMPM.png"
              alt="FMPM Logo"
              width="50%"
            />
          </div>
        </div>
      </div>
    </header>
    <section>
      <div class="container">
      <div class="row">
        <div class="col-md-12 title">
        <h3><u>Espace Professeur</u></h3>
            <?php if (isset($_SESSION['noProf'])) : ?>
                <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                    Vous êtes Connecte : <?php echo $_SESSION['nom'] ." ". $_SESSION['prenom'] ?> !</h6>
                <p><a href="logout.php" class="btn btn-primary"  role="button">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>
            <?php endif ?>
            <hr></div>
      </div>
        <div class="row">
       
          <div class="col-md-12">
            <h5 class="crenau">
              <i class="fa fa-clock-o" aria-hidden="true"></i> Tableau de
              Confirmation d accord pour les dates
            </h5>
            <br />
            <table class="table table-hover table-striped table-bordered myTable table-responsive-xl">
              <thead>
                <tr>
                  <th>Sujet</th>
                  <th>Date & Heure</th>
                  <th>Action</th>
                  <th>Motif</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">Bla Bla Bla Bla</td>
                  <td>12/07/2020 | 12h00</td>
                  <td>
                    <form action="bla.php" method="post">
                      <input 
                        class="form-check-input"
                        type="radio"
                        name="etat" onChange="getIfYesOrNon(this.value)"
                        value="1"
                      />
                      <label class="form-check-label"> Oui </label>
                      <span id="bla">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="etat"
                        value="2" onChange="getIfYesOrNon(this.value)"
                      />
                      <label class="form-check-label"> Non </label></span>
                    </form>
                  </td>
                  <td id="problem"></td>
                </tr>
              <!--Ajax Call with PHP and AJAX Here
            Etat 1 : En traitement .
            Etat 2 : Valide .
            Etat 3 : Rejete .
            -->
              <tr>
                <td scope="row">Bla Bla Bla Bla</td>
                <td>12/07/2020 | 12h00</td>
                <td>
                    <form action="bla.php" method="post" >
                      <input
                        class="form-check-input"
                        type="radio"
                        name="etat"
                        value="1"
                      />
                      <label class="form-check-label"> Oui </label>
                      <span id="bla">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="etat"
                        value="2"
                      />
                      <label class="form-check-label"> Non </label></span>
                    </form>
                  </td>
                <td>
            
                </td>
              </tr>
              <tr>
                <td scope="row">Bla Bla Bla Bla</td>
                <td>12/07/2020 | 12h00</td>
                <td>
                    <i class="fa fa-check-square" aria-hidden="true"></i> Validé .
                </td>
                <td></td>
              </tr>
              <tr>
                <td scope="row">Bla Bla Bla Bla</td>
                <td>12/07/2020 | 12h00</td>
                <td>
                    <i class="fa fa-spinner" aria-hidden="true"></i> Rejeté 
                </td>
                <td> En attente que l'étudiant choisit un nouveau créneau .</td>
              </tr>
              </tbody>
            </table>
            <!-- <button class="btn btn-success btn-custom" type="submit">
            <i class="fa fa-check-circle" aria-hidden="true"></i> Valider
          </button> -->
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
  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
  ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function getIfYesOrNon(val) {
    $.ajax({
      type: "POST",
      url: "showMe.php",
      data: 'etat=' + val,
      success: function(data) {
        $("#problem").html(data);
        // $("#problem").fadeOut(3000);
      }
    });
  }
</script>
</html>
