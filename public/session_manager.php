<?php
function etudiant_session()
{
    session_start();
    if (!isset($_SESSION['CNE'])) {
        header('location: index.php');
    } else {
        return $_SESSION['CNE'];
    }
}

function administration_session()
{
    session_start();
    if (!isset($_SESSION['num'])) {
        header('location: index.php');
    }
}

function prof_session()
{
    session_start();
    if (!isset($_SESSION['noProf'])) {
        header('location: index.php');
    } else {
        return $_SESSION['noProf'];
    }
}

function comite_session()
{
    session_start();
    if (!isset($_SESSION['comite'])) {
        header('location: index.php');
    }
}

function redirect()
{
    session_start();
    if (isset($_SESSION['username'])) {
        header('location: acceuilEtudiant.php');
    } elseif (isset($_SESSION['noProf'])) {
        header('location: choix_du_prof.php');
    } elseif (isset($_SESSION['comite'])) {
        header('location: comite_these.php');
    } elseif (isset($_SESSION['num'])) {
        header('location: administration.php');
    }
}