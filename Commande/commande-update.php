<?php
	extract($_POST);
	$r = "UPDATE commande
        SET idclient = '$idclient',
            idproduit = '$idproduit',
            datecommande = '$daterendezvous',
            statut = '$statut',
        WHERE idcommande = '" . $idcommande . "'";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("commande-list.php");
?>