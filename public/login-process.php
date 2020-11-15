<?php
    // ob_start();
    require_once("database_connect.php");
    session_start();
   
    if(isset($_POST['submit'])) {
       
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $hashed_password = md5($password);

        $query = "SELECT * FROM etudiant WHERE email='$username' AND no_apoge='$password'";

        $result = mysqli_query($db, $query);
        var_dump(json_encode($result));
        if  (!$result || mysqli_num_rows($result) === 1) {
            $_SESSION['username'] = $username;
            while ($row = $result->fetch_assoc()) {
                // echo $row['nom'] ;
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['CNE'] = $row['CNE'];

            }
            header('location: acceuilEtudiant.php');
        } else {
            echo "Non";
            $_SESSION['wrong'] = " Oups !! <strong>Email</strong> ou <strong> Mot de passe </strong> Invalide !!";

            header('location: loginDuThese.php');
        }
    }
?>

