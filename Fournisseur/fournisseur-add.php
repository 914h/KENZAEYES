<?php
	extract($_POST);
	$r = "INSERT INTO fournisseur
    (idf, nom, contact, tel, email, adresse, ville, pays, typedeproduit, conditionsdepaiement, conditiondelivraison, notes)
    VALUES
    ('".$idf."', '".$nom."', '".$contact."', '".$tel."', '".$email."', '".$adresse."', '".$ville."', 
	'".$pays."', '".$typedeproduit."', '".$conditionsdepaiement."', '".$conditiondelivraison."', '".$notes."')";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("fournisseur-list.php");
?>