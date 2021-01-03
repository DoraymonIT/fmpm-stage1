<?php
require_once('database_connect.php');
ob_start();
session_start();
$resr = $db->query("UPDATE creneau a,soutenance b SET a.etat=1,a.date_reservation=NULL,b.creneau=NULL,b.etat=4 WHERE TIMESTAMPDIFF(hour,a.date_reservation,NOW())>=72 AND a.id=b.creneau");
if (empty($_SESSION['CNE'])) {
    header('location: index.php');
}

$cne = $_SESSION['CNE'];
$query = "SELECT * FROM soutenance WHERE etudiant ='$cne' LIMIT 1 ";
$result = $db->query($query);
if (mysqli_num_rows($result) == 0) {
    header('location: dem_soutenance.php');
} else {
    $soutenance = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.css">
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.date.css">
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.time.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/mdb.min.css">
    <link rel="stylesheet" href="style.css">
    <title>
        Accueil de l'étudiant | Voir le progresse de demande de thèse .
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
    <div class="container">
        <div class="row">
            <div class="col-md-12 title">
                <h3><u>Espace Etudiant</u></h3>
                <?php if (isset($_SESSION['CNE'])) : ?>
                    <h6><i class="fa fa-user-circle" aria-hidden="true"></i>
                        Vous êtes Connecte : <?php echo $_SESSION['username'] ?> !</h6>
                    <p><a href="logout.php" class="btn btn-primary" role="button">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>
                <?php endif ?>
                <hr>

            </div>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h5 class="crenau">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> Informations
                        Principales
                    </h5>
                    <br>
                    <b> Nom Complet :</b>
                    <?php if (isset($_SESSION['nom'])) : ?>
                        <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
                    <?php endif ?>
                    <br />
                    <b> CNE:</b>
                    <?php if (isset($_SESSION['nom'])) : ?>
                        <?php echo $_SESSION['CNE'] ?>
                    <?php endif ?>
                    <hr>
                    <?php if (isset($_SESSION['succes_activation'])) : ?>
                        <h5 class="alert alert-info" role="alert" style="text-align: center;">
                            <?php echo "<b>" . $_SESSION['succes_activation'] . "</b>" ?>
                        </h5>
                    <?php endif ?>
                    <?php if (isset($_SESSION['edite_soutenenace'])) : ?>
                        <h5 class="alert alert-info" role="alert" style="text-align: center;">
                            <?php echo "<b>" . $_SESSION['edite_soutenenace'] . "</b>" ?>
                        </h5>
                    <?php endif ?>

                    <ul class="stepper stepper-vertical">
                        <!-- Bla Bla 1 Step -->
                        <!-- <li class="completed">
                        <a href="#!">
                            <span class="circle"><i class="fa fa-check"></i></span>
                            <a href="#">
                                <span class="circle"><i class="fa fa-spinner"></i></span>
                                <a href="#">
                                    <span class="circle"><i class="fa fa-exclamation"></i></span>
                                    <span class="label">Directeur | Validation choix du thèse</span>
                                </a>
                                <div class="step-content orange rounded lighten-3">
                                    Motif
                                </div>
                    </li> -->
                        <!-- Bla Bla 2 Step -->
                        <!-- <li class="completed">
                        <a href="#!">
                            <span class="circle"><i class="fa fa-check"></i></span>
                            >
                            <a href="#">
                                <span class="circle"><i class="fa fa-spinner"></i></span>
                                <a href="#">
                                    <span class="circle"><i class="fa fa-exclamation"></i></span>
                                    <span class="label">Comite du these | Validation du sujet de thèse .</span>
                                </a>
                                <div class="step-content orange rounded lighten-3">
                                    Motif
                                </div>
                    </li> -->
                        <!-- First Step -->
                        <li <?php if ($soutenance['etat'] >= 1 || $soutenance['etat'] < -1) { ?>class="completed">
                            <a href="#!">
                                <span class="circle"><i class="fa fa-check"></i></span><?php
                                                                                    } elseif ($soutenance['etat'] == 0) {
                                                                                        ?>
                                >
                                <a href="#">
                                    <span class="circle"><i class="fa fa-spinner"></i></span>
                                <?php
                                                                                    } elseif ($soutenance['etat'] == -1) { ?>
                                    class="warning">
                                    <a href="#">
                                        <span class="circle"><i class="fa fa-exclamation"></i></span>
                                    <?php } ?>

                                    <span class="label">Administration | Validation des relevés de notes <br> et cliniques</span>
                                    </a>
                                    <?php
                                    if ($soutenance['etat'] == -1) {
                                    ?>
                                        <div class="step-content orange rounded lighten-3">
                                            <?php
                                            echo $soutenance['motif'];
                                            ?>

                                        </div>

                                    <?php
                                    }
                                    ?>
                        </li>

                        <!-- Second Step -->
                        <li <?php if ($soutenance['etat'] >= 2 || $soutenance['etat'] < -2) { ?>class="completed">
                            <a href="#!">
                                <span class="circle"><i class="fa fa-check"></i></span><?php
                                                                                    } elseif ($soutenance['etat'] == -2) {
                                                                                        ?>

                                class="warning">
                                <a href="#">
                                    <span class="circle"><i class="fa fa-exclamation"></i></span>
                                <?php
                                                                                    } else { ?>
                                    >
                                    <a href="#">
                                        <span class="circle"><i class="fa fa-spinner"></i></span>
                                    <?php } ?>

                                    <span class="label">Commite Thèse | Accorde des membres de jury</span>
                                    </a>
                                    <?php
                                    if ($soutenance['etat'] == -2) {
                                    ?>
                                        <div class="step-content orange rounded lighten-3">
                                            <?php
                                            echo $soutenance['motif'];
                                            ?>

                                        </div>

                                    <?php
                                    }
                                    ?>
                        </li>

                        <!-- Third Step -->
                        <li <?php if ($soutenance['etat'] >= 3 || $soutenance['etat'] < -3) { ?>class="completed">
                            <a href="#!">
                                <span class="circle"><i class="fa fa-check"></i></span><?php
                                                                                    } elseif ($soutenance['etat'] == -3) {
                                                                                        ?>

                                class="warning">
                                <a href="#">
                                    <span class="circle"><i class="fa fa-exclamation"></i></span>
                                <?php
                                                                                    } else { ?>
                                    >
                                    <a href="#">
                                        <span class="circle"><i class="fa fa-spinner"></i></span>
                                    <?php } ?>

                                    <span class="label">Directeur | Accord de l impression</span>
                                    </a>
                                    <?php
                                    if ($soutenance['etat'] == -3) {
                                    ?>
                                        <div class="step-content orange rounded lighten-3">
                                            <?php
                                            echo $soutenance['motif'];
                                            ?>

                                        </div>

                                    <?php
                                    }
                                    ?>
                        </li>

                        <!-- Fourth Step -->
                        <li <?php if ($soutenance['etat'] >= 4 || $soutenance['etat'] < -4) { ?>class="completed">
                            <a href="#!">
                                <span class="circle"><i class="fa fa-check"></i></span><?php
                                                                                    } elseif ($soutenance['etat'] == -4) {
                                                                                        ?>

                                class="warning">
                                <a href="#">
                                    <span class="circle"><i class="fa fa-exclamation"></i></span>
                                <?php
                                                                                    } else { ?>
                                    >
                                    <a href="#">
                                        <span class="circle"><i class="fa fa-spinner"></i></span>
                                    <?php } ?>

                                    <span class="label">President | Accord de l impression </span>
                                    </a>
                                    <?php
                                    if ($soutenance['etat'] == -4) {
                                    ?>
                                        <div class="step-content orange rounded lighten-3">
                                            <?php
                                            echo $soutenance['motif'];
                                            ?>

                                        </div>

                                    <?php
                                    }
                                    ?>
                        </li>

                        <!-- Fiveth Step hh -->
                        <li <?php if ($soutenance['etat'] >= 5 || $soutenance['etat'] < -5) { ?>class="completed">
                            <a href="#!">
                                <span class="circle"><i class="fa fa-check"></i></span><?php
                                                                                    } elseif ($soutenance['etat'] == -5) {
                                                                                        ?>

                                class="warning">
                                <a href="#">
                                    <span class="circle"><i class="fa fa-exclamation"></i></span>
                                <?php
                                                                                    } else { ?>
                                    >
                                    <a href="#">
                                        <span class="circle"><i class="fa fa-spinner"></i></span>
                                    <?php } ?>

                                    <span class="label">Etudiant | Choix de la date</span>
                                    </a>
                                    <?php if ($soutenance['etat'] == 4) {
                                        $date = $soutenance['date_depot_sujet'];
                                        $date = date('Y-m-d', strtotime("+6 months", strtotime($date)));
                                        $today = date("Y-m-d");

                                        if ($today <= $date) {
                                    ?>
                                            <div class="step-content  rounded lighten-3">
                                                <form action="choix_du_date.php">
                                                    <button disabled class="btn btn-grey btn-custom"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        Choisir
                                                    </button>
                                                </form>

                                                <p>vous devez avoir min 6 mois apres avoir deposer votre sujet </p>
                                            </div>
                                        <?php

                                        } else {
                                        ?>
                                            <div class="step-content  rounded lighten-3">
                                                <a href="choix_du_date.php" class="btn btn-success btn-custom"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    Choisir</a>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    if ($soutenance['etat'] == -5) {
                                    ?>
                                        <div class="step-content orange rounded lighten-3">
                                            <?php
                                            echo $soutenance['motif'];
                                            ?>

                                        </div>

                                    <?php
                                    }
                                    ?>
                        </li>
                        <li <?php if ($soutenance['etat'] >= 6 || $soutenance['etat'] < -6) { ?>class="completed">
                            <a href="#!">
                                <span class="circle"><i class="fa fa-check"></i></span><?php
                                                                                    } elseif ($soutenance['etat'] == -5) {
                                                                                        ?>

                                class="warning">
                                <a href="#">
                                    <span class="circle"><i class="fa fa-exclamation"></i></span>
                                <?php
                                                                                    } else { ?>
                                    >
                                    <a href="#">
                                        <span class="circle"><i class="fa fa-spinner"></i></span>
                                    <?php } ?>

                                    <span class="label">Etudiant | Validation de la date</span>
                                    </a>
                                    <?php if ($soutenance['creneau']) {
                                // Hnaya diir if : seleon l etat , ana tnssa 3lya dakxxyy
                                        $creneau_id = $soutenance['creneau'];
                                        $query = "SELECT * FROM creneau WHERE id ='$creneau_id' LIMIT 1 ";
                                        $result_creneau = $db->query($query);
                                        while ($row_creneau = $result_creneau->fetch_assoc()) { ?>
                                            <div class="step-content ">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">Date Choisie : <?php echo $row_creneau['jour'] . " | " . $row_creneau['heure'] 
                                                        ."<br> Lieu Choisie : ".$row_creneau['lieu'] ."<br>Et Temps Restant : " 
                                                        // Date de reservation + (m3rtfch wach 72h wlla 48h ) ??
                                                        ?> 
                                               
                                                    </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                    <?php        }
                                    }  ?>

                                    <?php if ($soutenance['etat'] == 5) { ?>
                                        <div class="step-content  rounded lighten-3">
                                            <form action="soutenance_process.php" method="POST">
                                                <input hidden name="cne" value="<?php echo $cne ?>">
                                                <button name="valider_date_etudiant" class="btn btn-success btn-custom"><i class="fa fa-check mr-2" aria-hidden="true"></i>
                                                    Valider
                                                </button>
                                            </form>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($soutenance['etat'] == -5) {
                                    ?>
                                        <div class="step-content orange rounded lighten-3">
                                            <?php
                                            echo $soutenance['motif'];
                                            ?>

                                        </div>

                                    <?php
                                    }
                                    ?>
                        </li>

                        <!-- Sixsth Step hh -->
                        <li <?php if ($soutenance['etat'] >= 7 || $soutenance['etat'] < -7) { ?>class="completed">
                            <a href="#!">
                                <span class="circle"><i class="fa fa-check"></i></span><?php
                                                                                    } elseif ($soutenance['etat'] == -7) {
                                                                                        ?>

                                class="warning">
                                <a href="#">
                                    <span class="circle"><i class="fa fa-exclamation"></i></span>
                                <?php
                                                                                    } else { ?>
                                    >
                                    <a href="#">
                                        <span class="circle"><i class="fa fa-spinner"></i></span>
                                    <?php } ?>

                                    <span class="label">Directeur | Validation de la date</span>
                                    </a>
                                    <?php
                                    if ($soutenance['etat'] == -7) {
                                    ?>
                                        <div class="step-content orange rounded lighten-3">
                                            <?php
                                            echo $soutenance['motif'];
                                            ?>

                                        </div>

                                    <?php
                                    }
                                    ?>
                        </li>
                        <!-- Congrats hh -->

                    </ul>
                    <br>
                    <?php



                    ?>
                    <hr />
                    <?php
                    if (in_array($soutenance['etat'], array(-1, -3, -4, -7))) {
                        echo '<small id="mot" class="form-text text-muted">
                        Pou réactiver a nouveau votre demande , veuillez contacter le service concerné pour trouver la
                        solution de votre problème ci-dessus puis cliquez ici : </small>
                    <br>
                    <a href="soutenance_prob.php">
                        <button id="button1" class="btn  btn-success btn-custom btn-sm" onclick="loadingEvent()">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Réactiver
                        </button>
                        <button id="button2" class="btn  btn-success btn-custom btn-sm" disabled style="display: none;cursor: not-allowed;">
                        <i class="fa fa-spinner fa-spin"></i>
                      </button>
                    </a>';
                    } elseif ($soutenance['etat'] == -2) {
                        echo '<small id="mot" class="form-text text-muted">
                                        Pour éditer nouveau votre demande , veuillez contacter le service concerné pour trouver la
                                        solution de votre problème ci-dessus puis cliquez ici : </small>
                                    <br>
                                    <a href="soutenance_prob.php">
                                        <button  id="button1" class="btn  btn-success btn-custom btn-sm" onclick="loadingEvent()">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> Éditer
                                        </button>
                                        <button id="button2" class="btn  btn-success btn-custom btn-sm" disabled style="display: none;cursor: not-allowed;">
                                        <i class="fa fa-spinner fa-spin"></i>
                                      </button>
                                    </a>';
                    }

                    ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
    <!--                    <table style="width:100%">-->
    <!--                        <tr>-->
    <!--                            <th><i class="fa fa-user" aria-hidden="true"></i></th>-->
    <!--                            <th>Accord</th>-->
    <!--                        </tr>-->
    <!--                        <tr>-->
    <!--                            <td>L'administration</td>-->
    <!--                            --><?php
                                        //
                                        //                            if ($soutenance['etat'] >= 1 || $soutenance['etat'] < -1) {
                                        //                                echo '<td class="valide"><i class="fa fa-check-square" aria-hidden="true"></i> Validé . </td>';
                                        //                            } elseif ($soutenance['etat'] == 0) {
                                        //                                echo '<td class="en_cours"> <i class="fa fa-spinner" aria-hidden="true"></i> état en cours .</td>';
                                        //                            } elseif ($soutenance['etat'] == -1) {
                                        //                                echo '<td class="rejete"><i class="fa fa-times" aria-hidden="true"></i> Rejeté . </td>';
                                        //                            }
                                        //
                                        ?>
    <!---->
    <!--                        </tr>-->
    <!--                        --><?php
                                    //                        echo '<tr><td>Comité du thèse</td>';
                                    //                        if ($soutenance['etat'] >= 2 || $soutenance['etat'] < -2) {
                                    //                            echo '<td  class="valide"><i class="fa fa-check-square" aria-hidden="true"></i> Validé . </td>';
                                    //                        } elseif ($soutenance['etat'] == -2) {
                                    //                            echo '<td class="rejete"><i class="fa fa-times" aria-hidden="true"></i> Rejeté . </td>';
                                    //                        } else {
                                    //                            echo '<td class="en_cours"> <i class="fa fa-spinner" aria-hidden="true"></i> état en cours .</td>';
                                    //                        }
                                    //                        echo '</tr>';
                                    //
                                    //                        echo '<tr><td>Directeur</td>';
                                    //                        if ($soutenance['etat'] >= 3 || $soutenance['etat'] < -3) {
                                    //                            echo '<td class="valide"><i class="fa fa-check-square" aria-hidden="true"></i> Validé . </td>';
                                    //                        } elseif ($soutenance['etat'] == -3) {
                                    //                            echo '<td class="rejete"><i class="fa fa-times" aria-hidden="true"></i> Rejeté . </td>';
                                    //                        } else {
                                    //                            echo '<td class="en_cours"> <i class="fa fa-spinner" aria-hidden="true"></i> état en cours .</td>';
                                    //                        }
                                    //                        echo '</tr>';
                                    //
                                    //
                                    //                        echo '<tr><td>Président de jury</td>';
                                    //                        if ($soutenance['etat'] >= 4 || $soutenance['etat'] < -4) {
                                    //                            echo '<td class="valide"><i class="fa fa-check-square" aria-hidden="true"></i> Validé . </td>';
                                    //                        } elseif ($soutenance['etat'] == -4) {
                                    //                            echo '<td class="rejete"><i class="fa fa-times" aria-hidden="true"></i> Rejeté . </td>';
                                    //                        } else {
                                    //                            echo '<td class="en_cours"> <i class="fa fa-spinner" aria-hidden="true"></i> état en cours .</td>';
                                    //                        }
                                    //                        echo '</tr>';
                                    //
                                    //
                                    ?>
    <!---->
    <!---->
    <!--                    </table>-->
    <!--                    <br>-->
    <!--                    --><?php
                                //                    if ($soutenance['etat'] <= -1) {
                                ?>
    <!--                        <h5 class="alert alert-warning" role="alert" style="text-align: center;">-->
    <!--                            --><?php //echo "Motif : " . "<b>" . $soutenance['motif'] . "</b>"
                                        ?>
    <!--                        </h5>-->
    <!--                        <hr>-->
    <!---->

    <!---->
    <!---->

    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->
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
<script type="text/javascript" src="assets/js/mdb.min.js"></script>
<script>
    var b1 = document.getElementById('button1');
    var b2 = document.getElementById('button2');

    function loadingEvent() {
        b1.style.display = 'none';
        b2.style.display = 'block';
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="pickadate.js-3.6.2/lib/picker.js"></script>
<script src="pickadate.js-3.6.2/lib/picker.date.js"></script>
<script src="pickadate.js-3.6.2/lib/picker.time.js"></script>
<script>
    function profSelect(val) {
        const selects = document.querySelectorAll("select");
        const values = [];
        for (let i = 0; i < 6; i++) {
            if (selects[i].value !== '') {
                values.push(parseInt(selects[i].value))
            }
        }

        for (let i = 1; i < val.options.length; i++) {

            if (values.includes(parseInt(val.options[i].value))) {
                val.options[i].hidden = true;
            } else val.options[i].hidden = false;
        }

    }

    Date.prototype.addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }
    Date.prototype.subDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() - days);
        return date;
    }
    $(document).ready(
        function() {
            var min_d = new Date().addDays(30)
            var min = min_d.getFullYear() + "-" + (+min_d.getMonth() + 1) + "-" + min_d.getDate();


            $.ajax({
                type: "POST",
                url: "test.php",
                data: {
                    'min-date': min
                },
                success: function(data) {
                    let dates = [true]
                    for (let i = 0; i < data.length; i++) {
                        dates.push(new Date(data[i]));
                    }
                    $('.datepicker').pickadate({
                        onClose: function() {
                            $("#creneux").fadeIn(2000);
                        },
                        disable: dates
                    });

                },
                error: function() {

                },
                dataType: 'json'
            });
        }
    )

    function getCreneaux(val) {
        var d = new Date(val)
        var dateF = d.getFullYear() + "-" + (+d.getMonth() + 1) + "-" + d.getDate();
        $.ajax({
            type: "POST",
            url: "crenaeu-process.php",
            data: 'date_ex=' + dateF,
            success: function(data) {
                $("#cre-list").html(data);
            }
        });
    }

    // $('.datepicker').pickadate();
    $('.datepicker1').pickadate({
        max: new Date().subDays(180)
    })
</script>

</html>