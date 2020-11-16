<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="style.css" />
  <title>Interface de l'administration | Voir le progresse de demande de thèse .</title>
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
        <div class="col-md-12">
          <h5 class="crenau">
            <i class="fa fa-clock-o" aria-hidden="true"></i> Tableau de
            Confirmation d'accord de l'élegibilté de passer le soutenance .
          </h5>
          <br />
          <table class="table table-hover table-striped table-bordered myTable table-responsive-xl">
            <thead>
              <tr>
                <th>#</th>
                <th>Sujet</th>
                <th>Date & Heure</th>
                <th>L'Accord</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td>
                  <button title="Cliquez Ici pour les relevés de notes et les stages et les cliniques de cet étudiant avant de confirmer la validation ." class="btn btn-sm btn-info">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                  </button>
                </td>
                <td >Bla Bla Bla Bla</td>
                <td>12/07/2020 | 12h00</td>
                <td>
                  <form action="bla.php" method="post">
                    <input class="form-check-input" type="radio" name="etat" value="1" onChange="getIfYesOrNon(this.value)" />
                    <label class="form-check-label"> Oui </label>
                    <span id="bla">
                      <!-- When the button is "NON" a Popup opens say the admin to put in
                         the form why he or she choose No "Description of the problem"  -->
                      <input class="form-check-input" type="radio" name="etat" value="2" onChange="getIfYesOrNon(this.value)" />
                      <label class="form-check-label"> Non </label></span>
                  </form>
                </td>
              <td>
              <button class="btn btn-success btn-custom" type="submit" name="accord_administration">
                    <i class="fa fa-check-circle" aria-hidden="true"></i> Valider
                </button>
              </td>
              </tr>
              
            </tbody>

          </table>
          <div class="row" id="problem_admin" ></div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function getIfYesOrNon(val) {
    $.ajax({
      type: "POST",
      url: "showMe.php",
      data: 'etat_admin=' + val,
      success: function(data) {
        $("#problem_admin").html(data);
        // $("#problem").fadeOut(3000);
      }
    });
  }
</script>
</html>