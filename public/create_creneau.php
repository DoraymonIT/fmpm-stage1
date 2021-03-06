<?php
require_once("database_connect.php");
$query = "SELECT * FROM creneau ";

$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" type="text/css" href="pickadate.js-3.6.2/daterangepicker.css" />
  <link rel="stylesheet" href="style.css" />
  <title>Admin | Créer les créneaux .</title>
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
        <div class="col-md-5">
          <h5 style="    text-align: center;
          background-color: teal;
          padding: 10px;
          color: white;"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter Un nouveau Créneau</h5>
          <br />
          <form method="post" action="crenaeu-process.php">

            <input type="text" class="form-control form-control-sm" name="daterange" required />
            <br />
            <button type="submit" class="btn btn-success" name="submit-creneau">Ajouter</button>
          </form> <br>
        </div>
        <div class="col-md-7">
          <table id="myTable" class="table table-hover table-striped table-bordered">
            <thead class="thead-inverse" id="myTable">
              <tr>
                <th>Jour</th>
                <th>Heure de départ</th>
                <th>Lieu</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              while ($row = $result->fetch_assoc()) {

              ?>
                <tr>
                  <td><?php echo $row['jour']; ?></td>
                  <td><?php echo $row['heure']; ?></td>
                  <td><?php echo $row['lieu']; ?></td>
                  <td>
                    <?php if ($row['etat'] != 2) { ?>
                      <button type="submit" id="<?php echo $row['id']; ?>" class="delbutton btn btn-sm btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i></button>
                    <?php } else {
                      $soutenance = "SELECT * FROM soutenance ";
                      $result1 = mysqli_query($db, $soutenance);
                      while ($row1 = $result1->fetch_assoc()) {
                        if ($row1['creneau'] == $row['id']) {
                          echo 'Réservée par ' . "<b>" . $row1['etudiant'] . "</b>";
                        } else {
                          // echo "-----R-----";
                        }
                      }
                    } ?>
                  </td>
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
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="pickadate.js-3.6.2/daterangepicker.js"></script>
<script>
  $('#myTable').DataTable({
    language: {
      processing: "Traitement en cours...",
      search: "Rechercher&nbsp;:",
      lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
      info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
      infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
      infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
      infoPostFix: "",
      loadingRecords: "Chargement en cours...",
      zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
      emptyTable: "Aucune donnée disponible dans le tableau",
      paginate: {
        first: "Premier",
        previous: "Pr&eacute;c&eacute;dent",
        next: "Suivant",
        last: "Dernier"
      },
      aria: {
        sortAscending: ": activer pour trier la colonne par ordre croissant",
        sortDescending: ": activer pour trier la colonne par ordre décroissant"
      }
    }
  });
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left',
      isInvalidDate: function(date) {
        return (date.day() == 0 || date.day() == 6);
      },
      locale: {
        cancelLabel: 'Clear'
      }
    }, function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });
  $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
    //do something, like clearing an input
    $('input[name="daterange"]').val('');
  });
</script>
<script type="text/javascript">
  $(function() {

    $(".delbutton").click(function() {
      var del_id = $(this).attr("id");
      var info = 'id=' + del_id;
      var tr = $(this).closest('tr');
      $.ajax({
        type: "POST",
        url: "delete-process.php", //URL to the delete php script
        data: info,
        success: function() {
          tr.fadeOut(1000, function() {
            $(this).remove();
          });
        },
        error: function() {
          alert("some error");
        }
      });

      return false;
    });
  });
</script>

</html>