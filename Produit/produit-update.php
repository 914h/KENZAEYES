<?php
	extract($_POST);
	$r = "UPDATE produit
        SET idc = '$idc',
            idf = '$idf',
            nomproduit = '$nomproduit',
            marque = '$marque',
            notes = '$notes',
            prixdachat = '$prixdachat',
            tvaappliquee = '$tvaappliquee',
            prixdevente = '$prixdevente',
            qteenstock  = '$qteenstock ',
            seuildalerte = '$seuildalerte'
        WHERE idproduit = '" . $id . "'";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("produit-list.php");
?>