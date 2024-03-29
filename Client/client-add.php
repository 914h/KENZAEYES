<?php
	extract($_POST);
	$r = "INSERT INTO client
    (nom, prenom, adresse, telephone, email, dateNaissance, ordonnances, historiqueAchats)
    VALUES
    ('".$nom."', '".$prenom."', '".$adresse."', '".$telephone."', '".$email."',
	 '".$dateNaissance."', '".$ordonnances."', '".$historiqueAchats."')";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("client-list.php");
?>