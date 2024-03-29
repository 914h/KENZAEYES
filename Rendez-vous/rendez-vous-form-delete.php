<?php
$id = $_GET['id'];
$r = "select * from produit where idp = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<div class="container" style="margin-top: 100px;">
	<form method="POST" action="#">
	<div class="row">
			<div class="datadelete col-6">
				<fieldset>
					<legend>cabinet à supprimer</legend>
					<label>ID Produit</label>
                    <input type="text" name="idp" value="<?php echo $data['idp']; ?>" class="form-control" disabled>
                    <input type="hidden" name="id" value="<?php echo $data['idp']; ?>">

                    <label>ID Categorie</label>
                    <input type="text" name="idc" value="<?php echo $data['idc']; ?>" class="form-control" disabled>

                    <label>ID fournisseur</label>
                    <input type="text" name="idf" value="<?php echo $data['idf']; ?>" class="form-control" disabled>

                    <label>Nom produit</label>
                    <input type="text" name="nomproduit" value="<?php echo $data['nomproduit']; ?>" class="form-control" disabled>

                    <label>Marque</label>
                    <input type="text" name="marque" value="<?php echo $data['marque']; ?>" class="form-control" disabled>

                    <label>Notes</label>
                    <input type="text" name="notes" value="<?php echo $data['notes']; ?>" class="form-control" disabled>

					<label>Prix d'achat</label>
                    <input type="text" name="prixdachat" value="<?php echo $data['prixdachat']; ?>" class="form-control" disabled>

                    <label>TVA appliquee</label>
                    <input type="text" name="tvaappliquee" value="<?php echo $data['tvaappliquee']; ?>" class="form-control" disabled>

                    <label>Prix de vente</label>
                    <input type="text" name="prixdevente" value="<?php echo $data['prixdevente']; ?>" class="form-control" disabled>

                    <label>Quantite en stock</label>
                    <input type="text" name="qteenstock" value="<?php echo $data['qteenstock']; ?>" class="form-control" disabled>

                    <label>Seuil d'alerte</label>
                    <input type="text" name="seuildalerte" value="<?php echo $data['seuildalerte']; ?>" class="form-control" disabled><br>
                    
				</fieldset>
			</div>
			<div class="cledelete col-6">
				<i class="fa-solid fa-key"></i>
				<h2>Suppression</h2>
				<label>Entrez la clé de la suppression</label>
				<input type="password" name="cledelete" class="form-control"
					style="width: 300px;text-align: center; margin: auto;" autofocus>

				<div class="container mt-3">
					<div class="alert alert-warning" role="alert">
						<i class="fa-solid fa-triangle-exclamation"></i><br>Les données supprimées ne seront plus
						récupérables. Êtes-vous sûr de vouloir continuer ?
					</div>
					<button type="submit" class="btn btn-danger"><i class="fas fa-trash-can"></i> Supprimer </button>
				</div>

			</div>
		</div>


	</form>
</div>

<?php
extract($_POST);
if (isset($cledelete)) {
	if ($cledelete != "123") {
		echo "<div class='alert alert-info' role='alert'><center>
        <h4><i class='fa-solid fa-triangle-exclamation'></i> Clé de suppression incorrecte...</h4></center></div>";
	} else {
		$r = "delete from produit where idp = '" . $id . "'";
		$re = "ALTER TABLE cabinet AUTO_INCREMENT = 0";
		require("../connexion.php");
		mysqli_query($con, $r);
		mysqli_query($con, $re);
		mysqli_close($con);
		require("../fonctions.php");
		redirection("produit-list.php");
	}
}
?>