<?php
require_once("database_connect.php");
if (!empty($_POST["date_ex"])) {

    $date_selected = $_POST["date_ex"];
    // echo  date_format (new DateTime($countryId), 'Y-m-d');
    $date_formatted = date_format(new DateTime($date_selected), 'Y-m-d');

    $query = "SELECT * FROM creneau WHERE jour= '$date_formatted' ";
    $result = mysqli_query($db, $query);
?>

   
    <?php
 if  (mysqli_num_rows($result) === 0) { 
     ?>
 <option value="">Oups !! Aucun Créneau Disponible !!</option>
 <?php
} else {
    ?> <option value="">Choisir un créneau disponible</option><?php
    foreach ($result as $op) {
    ?>
    
        <option value="<?php echo $op["id"]; ?>"><?php echo $op["heure"] . " , Lieu : " . $op["lieu"] ?></option>
<?php
    }
}



}
?>