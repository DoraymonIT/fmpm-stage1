<?php

use setasign\Fpdi\Fpdi;

require_once('fpdf181/fpdf.php');
require_once('fpdi2/src/autoload.php');
require_once('service.php');


$id = $_GET['id'];
if (isset($id)) {
    $soutenance = get_soutenance_byID($id);
    if ($soutenance != null) {
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            if ($type == 'autorisation') {
                $etudiant = get_etudiant_byCNE($soutenance['etudiant']);
                $date = get_creneau_byID($soutenance['creneau']);
                $pdf = new FPDI();
                $pdf->AddPage();
                $pdf->setSourceFile('autorisation.pdf');
                $tplIdx = $pdf->importPage(1);
                $pdf->useTemplate($tplIdx);
                $pdf->SetFont('Arial', 'B', '10');
                $pdf->SetXY(34, 68);
                $pdf->Write(0, $soutenance['intitule_these']);
                $pdf->SetXY(60, 82);
                $pdf->Write(0, $id);
                $pdf->SetXY(60, 97);
                $pdf->Write(0, $etudiant['nom'] . ' ' . $etudiant['prenom']);
                $pdf->SetXY(60, 105);
                $pdf->Write(0, $soutenance['etudiant']);
                $pdf->SetXY(70, 113);
                $pdf->Write(0, date('d/m/Y', strtotime($date['jour'])));
                $pdf->SetXY(155, 113);
                $pdf->Write(0, $date['heure']);
                $pdf->SetXY(99, 128);
                $pdf->Write(0, get_prof_byID($soutenance['president'])['nom'] . ' ' . get_prof_byID($soutenance['president'])['prenom']);
                $pdf->SetXY(99, 136);
                $pdf->Write(0, get_prof_byID($soutenance['directeur'])['nom'] . ' ' . get_prof_byID($soutenance['directeur'])['prenom']);
                $pdf->SetXY(99, 144);
                $pdf->Write(0, get_prof_byID($soutenance['jury1'])['nom'] . ' ' . get_prof_byID($soutenance['jury1'])['prenom']);
                $pdf->SetXY(99, 151);
                $pdf->Write(0, get_prof_byID($soutenance['jury2'])['nom'] . ' ' . get_prof_byID($soutenance['jury2'])['prenom']);
                $pdf->SetXY(99, 159);
                $pdf->Write(0, get_prof_byID($soutenance['jury3'])['nom'] . ' ' . get_prof_byID($soutenance['jury3'])['prenom']);
                $pdf->SetXY(99, 167);
                $pdf->Write(0, get_prof_byID($soutenance['jury4'])['nom'] . ' ' . get_prof_byID($soutenance['jury4'])['prenom']);
                $pdf->SetXY(143, 201);
                $pdf->Write(0, date('d/m/Y'));
                $pdf->Output('D', 'Autorisation_de_soutenance_de_these_' . $id . '.pdf');
            }elseif ($type == 'pv') {
                $etudiant = get_etudiant_byCNE($soutenance['etudiant']);
                $date = get_creneau_byID($soutenance['creneau']);
                $pdf = new FPDI();
                $pdf->AddPage();
                $pdf->setSourceFile('pv.pdf');
                $tplIdx = $pdf->importPage(1);
                $pdf->useTemplate($tplIdx);
                $pdf->SetFont('Arial', 'B', '10');
                $pdf->SetXY(23, 92);
                $pdf->Write(0, $soutenance['intitule_these']);
                $pdf->SetXY(109, 77);
                $pdf->Write(0, $id);
                $pdf->SetXY(75, 103);
                $pdf->Write(0, $etudiant['nom'] . ' ' . $etudiant['prenom']);
                $pdf->SetXY(25, 228);
                $pdf->Write(0, $etudiant['nom'] . ' ' . $etudiant['prenom']);
                $pdf->SetXY(30, 115);
                $pdf->Write(0, date('d/m/Y', strtotime($date['jour'])));
                $pdf->SetXY(66, 115);
                $pdf->Write(0, date('H:i', strtotime($date['heure'])));
                $pdf->SetXY(60, 133);
                $pdf->Write(0, get_prof_byID($soutenance['president'])['nom'] . ' ' . get_prof_byID($soutenance['president'])['prenom']);
                $pdf->SetXY(60, 144);
                $pdf->Write(0, get_prof_byID($soutenance['directeur'])['nom'] . ' ' . get_prof_byID($soutenance['directeur'])['prenom']);
                $pdf->SetXY(60, 154);
                $pdf->Write(0, get_prof_byID($soutenance['jury1'])['nom'] . ' ' . get_prof_byID($soutenance['jury1'])['prenom']);
                $pdf->SetXY(60, 165);
                $pdf->Write(0, get_prof_byID($soutenance['jury2'])['nom'] . ' ' . get_prof_byID($soutenance['jury2'])['prenom']);
                $pdf->SetXY(60, 175);
                $pdf->Write(0, get_prof_byID($soutenance['jury3'])['nom'] . ' ' . get_prof_byID($soutenance['jury3'])['prenom']);
                $pdf->SetXY(60, 186);
                $pdf->Write(0, get_prof_byID($soutenance['jury4'])['nom'] . ' ' . get_prof_byID($soutenance['jury4'])['prenom']);

                $pdf->Output('D', 'PV_' . $id . '.pdf');
            }


        } elseif ($soutenance['etat'] == 9) {
            $etudiant = get_etudiant_byCNE($soutenance['etudiant']);
            $pdf = new FPDI();
            $pdf->AddPage();
            $pdf->setSourceFile('attestation.pdf');
            $tplIdx = $pdf->importPage(1);
            $pdf->useTemplate($tplIdx);
            $pdf->SetFont('Arial', 'B', '10');
            $pdf->SetXY(56, 116);
            $pdf->Write(0, $etudiant['nom'] . ' ' . $etudiant['prenom']);
            $pdf->SetXY(82, 155);
            $pdf->Write(0, $id);
            $pdf->SetXY(145, 199);
            $pdf->Write(0, date('d/m/Y'));
            $pdf->Output('D', 'Attestation' . $id . '.pdf');

        } else {
            header('location: index.php');
        }

    } else {
        header('location: index.php');

    }
} else {
    header('location: index.php');
}