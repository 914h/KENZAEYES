<?php
	extract($_POST);
	$r = "UPDATE rendezvous
        SET idclient = '$idc',
            idcabinet = '$idf',
            daterendezvous = '$daterendezvous',
            heurerendezvous = '$heurerendezvous',
            notes = '$notes',
            niveaudecredibilite = '$niveaudecredibilite',
        WHERE idrendezvous = '" . $id . "'";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("rendez-vous-list.php");
?>