<?php
require_once('database_connect.php');
ob_start();
session_start();
$query = "SELECT * FROM soutenance where etat >=7 ";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>
        Listes des soutenances valides
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

                <div class="col-md-12">
                    <h5 class="crenau">
                        <i class="fa fa-list" aria-hidden="true"></i> Listes des soutenances valides
                    </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-success btn-sm" href="administration.php" role="button">
                                <i class="fa fa-caret-left" aria-hidden="true"></i> Retour</a></div>
                        <div class="col-md-8"></div>
                    </div>
                    <br />
                    <table style="width:100%" class="table table-hover table-striped table-bordered myTable">
                        <thead>
                            <th><i class="fa fa-user" aria-hidden="true"></i> Thésard</th>
                            <th>Sujet</th>
                            <th>Date ,Heure et Lieu</th>
                            <th>Président de jury</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td> <?php echo $row['etudiant']; ?></td>
                                    <td>
                                        <?php echo $row['intitule_these']; ?>
                                    </td>
                                    <td><?php
                                        $creneau_id = $row['creneau'];
                                        $query1 = "select * from creneau where id=$creneau_id";
                                        $result1 = mysqli_query($db, $query1);
                                        $creneau = $result1->fetch_assoc();
                                        echo $creneau['jour'] . " " . $creneau['heure'] . " " . $creneau['lieu'];

                                        ?></td>
                                    <td></td>
                                    <td> <button class="btn btn-sm btn-success ">
                                            <i class="fa fa-print" aria-hidden="true"></i></button> </td>
                                </tr>
                            <?php
                            } ?>
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