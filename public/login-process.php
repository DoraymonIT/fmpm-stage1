<?php
// ob_start();
require_once("database_connect.php");
session_start();
// Login Etudiant
if (isset($_POST['submit_etudiant'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    // $hashed_password = md5($password);

    $query = "SELECT * FROM etudiant WHERE email='$username' AND no_apoge='$password'";

    $result = mysqli_query($db, $query);
    var_dump(json_encode($result));
    if (!$result || mysqli_num_rows($result) === 1) {
        $_SESSION['username'] = $username;
        while ($row = $result->fetch_assoc()) {
            // echo $row['nom'] ;
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['CNE'] = $row['CNE'];
            $_SESSION['no_apoge'] = $row['no_apoge'];
        }
        header('location: acceuilEtudiant.php');
    } else {
        echo "Non";
        $_SESSION['wrong'] = " Oups !! <strong>Email</strong> ou <strong> Mot de passe </strong> Invalide !!";

        header('location: loginDuThese.php');
    }
}
// Login Prof
if (isset($_POST['submit_prof'])) {

    $email = $_POST['email_prof'];
    $pass = $_POST['pass_prof'];
    // $hashed_password = md5($password);

    $query = "SELECT * FROM prof WHERE email='$email' AND noProf='$pass'";

    $result = mysqli_query($db, $query);
    var_dump(json_encode($result));
    if (!$result || mysqli_num_rows($result) === 1) {
        $_SESSION['prof'] = $email;
        while ($row = $result->fetch_assoc()) {
            // echo $row['nom'] ;
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['noProf'] = $row['noProf'];
        }
        header('location: prof.php');
    } else {
        echo "Non";
        $_SESSION['wrong'] = " Oups !! <strong>Email</strong> ou <strong> Mot de passe </strong> Invalide !!";

        header('location: loginDuThese.php');
    }
} else {
    echo "Veuillez Ressayer";
}

// Login Administration
if (isset($_POST['submit_admin'])) {

    $email = $_POST['email_admin'];
    $pass = $_POST['pass_admin'];
    // $hashed_password = md5($password);

    $query = "SELECT * FROM administration WHERE email='$email' AND num='$pass'";

    $result = mysqli_query($db, $query);
    var_dump(json_encode($result));
    if (!$result || mysqli_num_rows($result) === 1) {
        
        while ($row = $result->fetch_assoc()) {
            // echo $row['nom'] ;
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['num'] = $row['num'];

        }
        header('location: administration.php');
    } else {
        echo "Non";
        $_SESSION['wrong'] = " Oups !! <strong>Email</strong> ou <strong> Mot de passe </strong> Invalide !!";

        header('location: loginDuThese.php');
    }
} else {
    echo "Veuillez Ressayer";
}
