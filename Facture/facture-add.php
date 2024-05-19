<?php
    require("../fonctions.php");
    require("../connexion.php");
	extract($_POST);
    $r = "INSERT INTO facture 
    VALUES ('$idfacture', '$idclient', '$datefacture', '$totalht', '$totaltva', '$totalttc', '$statut', '$datepaiement', '$modepaiement', '$notes')";

    mysqli_query($con, $r);
    mysqli_close($con);
    redirection("commande-list.php");
?>
