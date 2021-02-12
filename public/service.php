<?php

function get_soutenance_result(array $args = array())
{
    require('database_connect.php');
    $etat = !isset($args['etat']) ? '' : sprintf(" AND etat = '%s'", $args['etat']);
    $etudiant = !isset($args['etudiant']) ? '' : sprintf(" AND etudiant = '%s'", $args['etudiant']);
    $directeur = !isset($args['directeur']) ? '' : sprintf(" AND directeur = '%s'", $args['directeur']);
    $president = !isset($args['president']) ? '' : sprintf(" AND president = '%s'", $args['president']);
    $limit = !isset($args['limit']) ? '' : ' LIMIT ' . $args['limit'];

    $query = "SELECT * FROM soutenance WHERE soutenance_id IS NOT NULL" . $etat . $etudiant . $directeur . $president . $limit;
    return mysqli_query($db, $query);

}

function get_etudiant_byCNE($cne)
{
    require('database_connect.php');
    $query = "SELECT * FROM etudiant WHERE CNE = '$cne' LIMIT 1 ";
    $res = mysqli_query($db, $query);
    return $res->fetch_assoc();
}

function get_prof_byID($id)
{
    require('database_connect.php');
    $query = "SELECT * FROM prof WHERE id = '$id' LIMIT 1 ";
    $res = mysqli_query($db, $query);
    return $res->fetch_assoc();
}

function get_soutenance_byID($id)
{
    require('database_connect.php');
    $query = "SELECT * FROM soutenance WHERE soutenance_id = '$id' LIMIT 1 ";
    $res = mysqli_query($db, $query);
    return $res->fetch_assoc();
}

function get_creneau_byID($id)
{
    require('database_connect.php');
    $query = "SELECT * FROM creneau WHERE id ='$id' LIMIT 1 ";
    $res = mysqli_query($db, $query);
    return $res->fetch_assoc();
}

function get_table($result, $last = false, $soutenu = false)
{
    $colspan = 8;
    echo '<table class="table table-hover table-striped table-bordered myTable table-responsive-xl">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Étudiant(e)</th>
                        <th>CNE</th>
                        <!-- <th>Numéro Apogée</th> -->
                        <th>Sujet</th>
                        <th>Date de dépôt de sujet</th>
                        ';
    if (!$soutenu) {
        echo '<th>L\'Accord</th>
<th>Motif</th>';
    }
    echo '
                        
                        <!-- <th>info</th> -->
                        <th>Action</th>';
    if ($last) {
        echo ' <th>Autorisation</th>
  <th>PV</th>';
    }
    $colspan = $last ? $colspan + 2 : $colspan;
    $colspan = $soutenu ? $colspan - 2 : $colspan;
    echo '    </tr>
                    </thead>
                    <tbody role="tablist" id="accordion-1">
                    ';
    if (mysqli_num_rows($result) == 0) {

        echo '<tr><td colspan="' . $colspan . '" class="text-center">Aucune soutenance trouvé</td></tr>';
    }
    while ($row = $result->fetch_assoc()) {
        echo '
                        <tr id="row_' . $row['soutenance_id'] . '" role="tab">
                            <td>
                                <a data-toggle="collapse" aria-expanded="true"
                                   aria-controls="accordion-1 .item-' . $row['soutenance_id'] . '"
                                   class="btn btn-info rounded-circle"
                                   href="#accordion-1 .item-' . $row['soutenance_id'] . '">
                                    <i class="fa menu-item"></i></a>
                            </td>
                            <td>';
        $etudiant = get_etudiant_byCNE($row['etudiant']);
        echo $etudiant['nom'] . " " . $etudiant['prenom'];


        echo '</td><td>
                             ' . $row['etudiant'] . '
                            </td>
                            <td>
                                ' . $row['intitule_these'] . '
                            </td>
                            <td> ' . $row['date_depot_sujet'] . '</td>
                            ';
        if (!$soutenu){
            echo '<td>
                              
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="radio_' . $row['soutenance_id'] . '" value="1"
                                           onChange="getIfYesOrNon(this.value,' . $row['soutenance_id'] . ')">
                                    <label class="form-check-label" for="inlineRadio1">Accordé</label>
                                </div>
                                <div class="form-check form-check-inline">
                                            <span id="bla">
                                                <input class="form-check-input" type="radio"
                                                       name="radio_' . $row['soutenance_id'] . '" value="2"
                                                       onChange="getIfYesOrNon(this.value,' . $row['soutenance_id'] . ')">
                                                <label class="form-check-label"
                                                       for="inlineRadio2">Désaccordé</label></span>
                                </div>
                            </td>
                            <td>
                                <div class="row" style="display: none">
                                    <div class="mx-2">
                                        <textarea id="motif_' . $row['soutenance_id'] . '" name=""
                                                  class="form-control form-control-sm"
                                                  placeholder="le motif ou problème " required></textarea>
                                    </div>
                                </div>

                            </td>';
        }
        echo '
                            <!-- <td>
                                        <a data-toggle="collapse" aria-expanded="true"
                                         aria-controls="accordion-1 .item-' . $row['soutenance_id'] . '"
                                          class="btn btn-info rounded-circle" href="#accordion-1 .item-' . $row['soutenance_id'] . '">
                                            <i class="fa fa-caret-down"></i></a>
                                    </td> -->
                            <td>
                                <button class="btn btn-success btn-sm"
                                        onclick="enregister(' . $row['soutenance_id'] . ',' . $row['etat'] . ')">
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    ';
        if ($soutenu) echo 'A soutenu';else echo 'Enregistrer';
        echo'
                                </button>
                            </td>';
        if ($last) {
            echo '<td>
                                <button class="btn btn-danger "
                                        onclick="pdf(' . $row['soutenance_id'] . ',\'autorisation\')">
                                    <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                    
                                </button>
                            </td><td>
                                <button class="btn btn-danger "
                                        onclick="pdf(' . $row['soutenance_id'] . ',\'pv\')">
                                    <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                    
                                </button>
                            </td>';
        }
        echo '</tr>
                        <tr class="collapse item-' . $row['soutenance_id'] . ' " role="tabpanel"
                            data-parent="#accordion-1">
                            <td colspan="' . $colspan . '">
                                <div class="container-fluid">
                                    <h6 class="crenau"><i class="fa fa-info-circle" aria-hidden="true"></i> Info sur le
                                        soutenance : ' . $row['soutenance_id'] . '</h6>
                                    <div class="row" style="    text-align: left;">
                                        <div class="col-md-6">
                                            <ul>
                                                <li>
                                                    <h6> Date de depot du sujet
                                                        : ' . $row['date_depot_sujet'] . '</h6>
                                                </li>
                                                <li>
                                                    <h6>
                                                        Directeur : ';
        $prof = get_prof_byID($row['directeur']);
        echo $prof['nom'] . " " . $prof['prenom'];
        echo ' </h6>
                                                </li>
                                                <li>
                                                    <h6>Intitule du these : ' . $row['intitule_these'] . '</h6>

                                                </li>
                                                <li>
                                                    <h6>Nature du these :
                                                        ' . $row['nature_these'] . '
                                                    </h6>

                                                </li>
                                                <li>
                                                    <h6> Materiel d etude et Echantillage :
                                                        ' . $row['materiel_d_etude_et_echantillioannage'] . '</h6>
                                                </li>
                                                <li>
                                                    <h6> Duree de l etude : ' . $row['duree_d_etude'] . '</h6>
                                                </li>
                                                <li>
                                                    <h6> Lieu de l etude : ' . $row['lieu_d_etude'] . '</h6>
                                                </li>
                                                <li>
                                                    <h6>
                                                        Mots Cles :
                                                        ' . $row['mots_cles'] . '


                                                    </h6>
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="col-md-6">
                                            <ul>
                                                <li>
                                                    <h6> President de Jury :';
        $prof = get_prof_byID($row['president']);
        echo $prof['nom'] . " " . $prof['prenom'];
        echo '</h6>
                                                </li>
                                            </ul>
                                            <ul>
                                                <ol>
                                                    <li>
                                                        <h6> Membre de jury 1 : ';
        $prof = get_prof_byID($row['jury1']);
        echo $prof['nom'] . " " . $prof['prenom'];
        echo '</h6>
                                                    </li>
                                                    <li>
                                                        <h6> Membre de jury 2 : ';
        $prof = get_prof_byID($row['jury2']);
        echo $prof['nom'] . " " . $prof['prenom'];
        echo '</h6>
                                                    </li>
                                                    <li>
                                                        <h6> Membre de jury 3 : ';
        $prof = get_prof_byID($row['jury3']);
        echo $prof['nom'] . " " . $prof['prenom'];
        echo '</h6>
                                                    </li>
                                                    <li>
                                                        <h6> Membre de jury 4 : ';
        $prof = get_prof_byID($row['jury4']);
        echo $prof['nom'] . " " . $prof['prenom'];
        echo '</h6>
                                                    </li>
                                                </ol>

                                            </ul>';
        $id = $row['creneau'];
        $creneau = get_creneau_byID($id);
        if ($creneau != null) {
            echo '<ul>
                                                        <li>
                                                            <h6> 



<i class="fa fa-calendar" aria-hidden="true"></i> <u> Date choisie</u> :
<b> ' . $creneau['jour'] . " : " . date('H:i', strtotime($creneau['heure']))

                . ' ; </b>
<u><i class="fa fa-location-arrow" aria-hidden="true"></i> Lieu</u> :
</b>
    ' . $creneau['lieu'] . '></h6>
    </li>
    </ul>';
        }


        echo '</div>

    </div>
    </div>
    </td>
    </tr>';


    }
    echo '
    </tbody>

    </table>';
}