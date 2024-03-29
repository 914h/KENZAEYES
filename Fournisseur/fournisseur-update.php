<?php
	extract($_POST);
	$r = "update fournisseur
    set idf = '".$idf."',
    nom = '".$nom."',
    contact = '".$contact."',
    tel = '".$tel."',
    email = '".$email."',
    adresse = '".$adresse."',
    ville = '".$ville."',
    pays = '".$pays."',
    typedeproduit = '".$typedeproduit."',
    conditionsdepaiement = '".$conditionsdepaiement."',
    conditiondelivraison = '".$conditiondelivraison."',
    notes = '".$notes."'
    where idf = '".$id."'";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("fournisseur-list.php");
?>