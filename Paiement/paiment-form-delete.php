<?php
$id = $_GET['id'];
$r = "select * from commande where idcommande = '" . $id . "'";
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
					<label>ID commande</label>
                    <input type="text" name="idp" value="<?php echo $data['idcommande']; ?>" class="form-control" disabled>
                    <input type="hidden" name="id" value="<?php echo $data['idcommande']; ?>">

                    <label>ID client</label>
                    <input type="text" name="idc" value="<?php echo $data['idclient']; ?>" class="form-control" disabled>

                    <label>ID produit</label>
                    <input type="text" name="idf" value="<?php echo $data['idproduit']; ?>" class="form-control" disabled>

                    <label>date commande</label>
                    <input type="date" name="nomproduit" value="<?php echo $data['datecommande']; ?>" class="form-control" disabled>

                    <label>Statut</label>
                    <input type="text" name="marque" value="<?php echo $data['statut']; ?>" class="form-control" disabled>

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
		$r = "delete from commande where idcommande = '" . $id . "'";
		$re = "ALTER TABLE cabinet AUTO_INCREMENT = 0";
		require("../connexion.php");
		mysqli_query($con, $r);
		mysqli_query($con, $re);
		mysqli_close($con);
		require("../fonctions.php");
		redirection("commande-list.php");
	}
}
?>