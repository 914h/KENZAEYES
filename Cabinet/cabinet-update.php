<?php
	extract($_POST);
	$r = "update cabinet
        set nom = '$nomc',
        adresse = '$adresse',
        tel = '$telephone',
        email = '$email',
        siteweb = '$siteweb',
        responsable = '$responsable',
        specialite = '$specialite',
        ville = '$ville',
        pays = '$pays',
        codepostal = '$codepostal',
        logo = '$logo'
        where idc = '$id'";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("cabinet-list.php");
?>