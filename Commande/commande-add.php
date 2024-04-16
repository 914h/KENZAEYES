<?php
    require("../fonctions.php");
    require("../connexion.php");
	extract($_POST);
    $r = "INSERT INTO commande
    VALUES ('$idcommande', '$datecommande', '$idclient', '$idproduit', '$statut')";
    mysqli_query($con, $r);
    mysqli_close($con);
    redirection("commande-list.php");
?>
