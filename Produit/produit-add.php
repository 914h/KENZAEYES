<?php
    require("../fonctions.php");
    require("../connexion.php");
	extract($_POST);
    $r = "INSERT INTO produit (idc, idf, nomproduit, marque, notes, prixdachat, tvaappliquee, prixdevente, qteenstock, seuildalerte)
    VALUES ('$idc', '$idf', '$nomproduit', '$marque', '$notes', '$prixdachat', '$tvaappliquee', '$prixdevente', '$qteenstock', '$seuildalerte')";
    mysqli_query($con, $r);
    mysqli_close($con);
    redirection("produit-list.php");
?>
