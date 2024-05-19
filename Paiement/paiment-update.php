<?php
	extract($_POST);
	$r = "UPDATE paiement
        SET idpaiement = '$idpaiement',
            idcommande = '$idcommande',
            datepaiement = '$datepaiement',
            montantpaye = '$montantpaye',
        WHERE idpaiement = '" . $idpaiement . "'";
	require("../connexion.php");	
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("paiment-list.php");
?>