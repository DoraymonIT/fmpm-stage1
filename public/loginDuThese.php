<?php
require_once('database_connect.php');
ob_start();
session_start();
if (!empty($_SESSION['username'])) {
  header('location: index.php');
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
    <title>Login de l'étudiant | Voir le progresse de demande de thèse .</title>
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
        <?php if (isset($_SESSION['wrong'])): ?>
          <div class="alert alert-danger" role="alert" style="text-align: center;">
               <?php echo $_SESSION['wrong'] ?>    </div>
              <?php endif ?>          <div class="col-md-12 title">
            <h3><u>Authentifier</u></h3>
            <p>
              Saisir votre <b> Email</b> et <b>Numéro Apogée</b> est le mot de
              passe .
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <hr />
            <div class="shadow">
              <form action="login-process.php" method="post">
                <label>Votre Email <span>*</span></label>
                <input
                  type="text"
                  name="username"
                  class="form-control"
                  placeholder="Ex : ahmed@gmail.com" required
                />
                <br />
                <label>Votre Numéro Apogée <span>*</span></label>
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  placeholder="***********" required
                />
                <br />
                <button type="submit" name="submit"  class="btn btn-success btn-custom">Se Connecter</button>
              </form>
            </div>
          </div>
          <div class="col-md-4"></div>
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
</html>
