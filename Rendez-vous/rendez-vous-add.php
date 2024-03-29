<?php
    require("../fonctions.php");
    require("../connexion.php");
	extract($_POST);
    $r = "INSERT INTO rendezvous
    VALUES ('$idrendezvous', '$daterendezvous', '$heurerendezvous', '$idclient', '$idcabinet', '$notes', '$niveaudecredibilite')";
    mysqli_query($con, $r);
    mysqli_close($con);
    redirection("rendez-vous-list.php");
?>
