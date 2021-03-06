<?php
require_once('../database_connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="these.css" />
  <title>Choix du Thèse | Demande de thèse .</title>
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
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 title">
          <h3><u>Choix de sujet de thèse</u></h3>
          <p>
            Lire attentivement tous les thèses et choisi un et un seul sujet, toute information
            <b> erronée</b> <br />
            peut annuler votre demande .

          </p>

        </div>
      </div>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h5 class="crenau" id="info_controller">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Vos
            Informations <i class="fa fa-caret-menu" aria-hidden="true"></i>
          </h5>
          <span id="info">
            <!-- <hr> -->
            <br />
            <h6>Nom Complet : Blabla blabla</h6>
            <h6>CNE : 12345678</h6>
            . <br />
            . <br />
            .
            <!-- <hr> -->
          </span>
          <h5 class="crenau" id="these_controller">
            <i class="fa fa-pencil-square" aria-hidden="true"></i> Choix de
            sujet de thèse
            <i class="fa fa-caret-menu1" aria-hidden="true"></i>
          </h5>
          <br />
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </section>
  <section id="these">
    <div class="container-fluid">
      <div class="col-md-12">
        <form action="" method="post">
          <table class="table table-hover table-striped table-bordered myTable table-responsive">
            <thead>
              <tr>
                <th>Intitulé de la thèse</th>
                <th>Directeur de thèse</th>
                <th>Nature de la thèse</th>
                <th>Matériel d’étude et échantillonnage</th>
                <th>Durée de l’étude</th>
                <th>Lieu de l’étude</th>
                <th>Objectifs de l’étude</th>
                <th>Mots clés</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $theses = "SELECT * FROM these WHERE etat = 0";
              $result = mysqli_query($db, $theses);
              while ($row = $result->fetch_assoc()) {

              ?>
                <tr>
                  <td scope="row"><?php echo $row['intitule']  ?></td>
                  <td>
                    <?php
                    $prof_detailes = "SELECT * FROM prof WHERE id = " . $row['id_directeur_these'] . " ";
                    $result1 = mysqli_query($db, $prof_detailes);
                    while ($row1 = $result1->fetch_assoc()) {
                      echo $row1['nom'] . " " . $row1['prenom'];
                    } ?>
                    <!-- <?php echo $row['id_directeur_these'];  ?> -->
                  </td>
                  <td><?php echo $row['nature_etude'];  ?></td>
                  <td><?php echo $row['materiel_etude_echan'];  ?></td>
                  <td><?php echo $row['duree_etude'];  ?></td>
                  <td><?php echo $row['lieu_etude'];  ?></td>
                  <td><?php echo $row['objectifes_etude'];  ?></td>
                  <td>
                    <?php
                    $array = explode(',', $row['mots_cles']);
                    foreach ($array as $res) {
                    ?> <span class="badge badge-info"> <?php
                                                        echo $res; ?></span> <?php
                                                                            }
                                                                              ?>
                  </td>
                  <td>
                    <button class="btn btn-success btn-custom" type="submit">
                      <i class="fa fa-check-circle" aria-hidden="true"></i> Je choisis
                    </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </form>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"
  ></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  //   Info
  var m = $(".fa-caret-menu");
  var info = $("#info");
  var butt = $("#info_controller");

  m.addClass("fa-caret-down");

  butt.on("click", function() {
    if (m.hasClass("fa-caret-down")) {
      m.removeClass("fa-caret-down").addClass("fa-caret-up");
      info.fadeOut(500);
    } else {
      m.removeClass("fa-caret-up").addClass("fa-caret-down");
      info.fadeIn(1000);
    }
  });
  // These
  var m1 = $(".fa-caret-menu1");
  var these = $("#these");
  var butt1 = $("#these_controller");

  m1.addClass("fa-caret-down");

  butt1.on("click", function() {
    if (m1.hasClass("fa-caret-down")) {
      m1.removeClass("fa-caret-down").addClass("fa-caret-up");
      these.fadeOut(500);
    } else {
      m1.removeClass("fa-caret-up").addClass("fa-caret-down");
      these.fadeIn(1000);
    }
  });
</script>

</html>