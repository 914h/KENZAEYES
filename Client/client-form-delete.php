<?php
$id = $_GET['id'];
$r = "select * from client where idl = '" . $id . "'";
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
					<legend>Service à supprimer</legend>
					<label>Id</label>
					<input type="text" name="idservice" value="<?php echo $data['idl']; ?>" class="form-control"
						disabled>
					<input type="text" name="id" value="<?php echo $data['idl']; ?>" hidden>
					<label>Nom</label>
					<input type="text" name="nomservice" value="<?php echo $data['nom']; ?>" class="form-control"
						disabled>
					<label>prenom</label>
					<input type="text" name="prenom" value="<?php echo $data['prenom']; ?>" class="form-control"  disabled>

					<label>adresse</label>
					<input type="text" name="adresse" value="<?php echo $data['adresse']; ?>" class="form-control" disabled>
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $data['email']; ?>" class="form-control" disabled>

					<label>Adresse</label>
					<input type="text" name="dateNaissance" value="<?php echo $data['dateNaissance']; ?>"
						class="form-control" disabled>

					<label>ordonnances</label>
					<input type="text" name="ordonnances" value="<?php echo $data['ordonnances']; ?>"
						class="form-control" disabled>
					<label>historiqueAchats</label>
					<input type="text" name="historiqueAchats" value="<?php echo $data['historiqueAchats']; ?>"
						class="form-control" disabled>
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
		$r = "delete from client where idl = '" . $id . "'";
		$re = "ALTER TABLE client AUTO_INCREMENT = 0";
		require("../connexion.php");
		mysqli_query($con, $r);
		mysqli_query($con, $re);
		mysqli_close($con);
		require("../fonctions.php");
		redirection("client-list.php");
	}
}
?>