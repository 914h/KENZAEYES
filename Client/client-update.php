<?php
	extract($_POST);
	$r = "update client
    set nom = '".$nom."',
    prenom = '".$contact."',
    adresse = '".$tel."',
    telephone = '".$email."',
    email = '".$adresse."',
    dateNaissance = '".$ville."',
    ordonnances = '".$pays."',
    historiqueAchats = '".$typedeproduit."'
    where idl = ".$id."";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("client-list.php");
?>