<?php
require_once('database_connect.php');
require_once('session_manager.php');
ob_start();
redirect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="style.css" />
  <title>Login | Voir le progresse de demande de thèse .</title>
  <style>
    a {
      color: black;
      /* font-weight: 800; */
      text-decoration: none;
      background-color: transparent;
      -webkit-text-decoration-skip: objects;
    }

    a:hover {
      color: black;
    }

    .nav-item:hover {
      background-color: #009696;
      border-radius: 4px;
    }
  </style>
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
        <?php if (isset($_SESSION['wrong'])) : ?>
          <div class="alert alert-danger" role="alert" style="text-align: center;">
            <?php echo $_SESSION['wrong'] ?> </div>
        <?php endif ?> <div class="col-md-12 title">
          <h3><u>Authentifier</u></h3>
          <p>
            Saisir votre <b> Email</b> et Votre<b> Numéro </b> est le mot de
            passe .
          </p>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> <i class="fa fa-user-circle" aria-hidden="true"></i>
                Étudiant(e)</a>
            </li>
            <span style="padding-left: 2px;"></span>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> <i class="fa fa-user-md" aria-hidden="true"></i> Professeur(e)</a>
            </li>
            <span style="padding-left: 2px;"></span>
            <li class="nav-item">
              <a class="nav-link" id="pills-admin-tab" data-toggle="pill" href="#pills-admin" role="tab" aria-controls="pills-admin" aria-selected="false">
                <i class="fa fa-user-secret" aria-hidden="true"></i> Administration</a>
            </li>
            <span style="padding-left: 2px;"></span>
            <li class="nav-item">
              <a class="nav-link" id="pills-comite-tab" data-toggle="pill" href="#pills-comite" role="tab" aria-controls="pills-comite" aria-selected="true"> <i class="fa fa-user-circle" aria-hidden="true"></i>
                Comité du thèse</a>
            </li>
          </ul>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="container">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <hr />
              <div class="shadow">
                <form action="login-process.php" method="post">
                  <label> <i class="fa fa-envelope-square" aria-hidden="true"></i> Votre Email <span>*</span></label>
                  <div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                      </div>
                      <input type="text" name="username" class="form-control" placeholder="Ex : ahmed@gmail.com" required>
                    </div>
                  </div>
                  <br />
                  <label> <i class="fa fa-lock" aria-hidden="true"></i> Votre Numéro Apogée <span>*</span></label>
                  <div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> <i class="fa fa-lock" aria-hidden="true"></i> </div>
                      </div>
                      <input type="password" name="password" class="form-control" placeholder="***********" required>
                    </div>
                  </div>
                  <br />
                  <button type="submit" name="submit_etudiant" class="btn btn-success btn-custom"> <i class="fa fa-check-circle" aria-hidden="true"></i> Se Connecter</button>
                </form>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
        </div>

      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="container">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <hr />
              <div class="shadow">
                <form action="login-process.php" method="post">
                  <label>Votre Email <span>*</span></label>
                  <input type="text" name="email_prof" class="form-control" placeholder="Ex : ahmed@gmail.com" required />
                  <br />
                  <label>Votre Numéro Administratif <span>*</span></label>
                  <input type="password" name="pass_prof" class="form-control" placeholder="***********" required />
                  <br />
                  <button type="submit" name="submit_prof" class="btn btn-success btn-custom">Se Connecter</button>
                </form>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
        </div>



      </div>
      <div class="tab-pane fade" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">
        <div class="container">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <hr />
              <div class="shadow">
                <form action="login-process.php" method="post">
                  <label>Votre Email <span>*</span></label>
                  <input type="text" name="email_admin" class="form-control" placeholder="Ex : ahmed@gmail.com" required />
                  <br />
                  <label>Votre Numéro Administratif <span>*</span></label>
                  <input type="password" name="pass_admin" class="form-control" placeholder="***********" required />
                  <br />
                  <button type="submit" name="submit_admin" class="btn btn-success btn-custom">Se Connecter</button>
                </form>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
        </div>



      </div>
      <div class="tab-pane fade" id="pills-comite" role="tabpanel" aria-labelledby="pills-comite-tab">
        <div class="container">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <hr />
              <div class="shadow">
                <form action="login-process.php" method="post">
                  <label>Votre Email <span>*</span></label>
                  <input type="text" name="email_comite" class="form-control" placeholder="Ex : ahmed@gmail.com" required />
                  <br />
                  <label>Votre Numéro Administratif <span>*</span></label>
                  <input type="password" name="pass_comite" class="form-control" placeholder="***********" required />
                  <br />
                  <button type="submit" name="submit_comite" class="btn btn-success btn-custom">Se Connecter</button>
                </form>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
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

</html>