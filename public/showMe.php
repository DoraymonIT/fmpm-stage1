<?php
if (!empty($_POST["etat"])) {
    if ($_POST["etat"] == 2) {
?>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-9">
                    <input type="text" name="" class="form-control form-control-sm" placeholder=" Merci de nous dire le motif ou problème de dire NON" required />
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        Enregistrer
                    </button>
                </div>
            </div>
        </form>

    <?php
    } else { ?>
        Sujet Accordé avec succès .
<?php

    }
}
?>
<?php
if (!empty($_POST["etat_admin"])) {
    if ($_POST["etat_admin"] == 2) {
?>

      
            <form action="bla.php" method="post">
                <!-- <label>Motif
                    <span>*</span></label>
                <input type="text" name="" class="form-control form-control-sm" placeholder="Motif ou problème" required /> -->
                <label>Description du problème
                    <span>*</span></label>
                <textarea name="" id="" cols="2" rows="2" class="form-control" placeholder="Description du problème" required></textarea> <br>
                <button class="btn btn-success btn-custom" type="submit" name="accord_administration">
                    <i class="fa fa-check-circle" aria-hidden="true"></i> Valider
                </button>
            </form>
    

    <?php
    } else { ?>
       
       Succès .


<?php
    }
}
?>