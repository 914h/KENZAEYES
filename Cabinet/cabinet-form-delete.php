<?php
$id = $_GET['id'];
$r = "select * from cabinet where idc = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
$photo= $data['logo'];
require("../head.php");
?>
<div class="container" style="margin-top: 100px;">
	<form method="POST" action="#">
	<div class="row">
			<div class="datadelete col-6">
				<fieldset>
					<legend>cabinet à supprimer</legend>
					<label>Id cabinet </label>
					<input type="text" name="idc" value="<?php echo $data['idc']; ?>" class="form-control"
						disabled>
					<input type="text" name="id" value="<?php echo $data['idc']; ?>" hidden>
					<label>Nom cabinet</label>
					<input type="text" name="nomcabinet" value="<?php echo $data['nomc']; ?>" class="form-control"
						disabled>
					<label>adresse</label>
					<input type="text" name="adresse" value="<?php echo $data['adresse']; ?>" class="form-control"  disabled>

					<label>telephone</label>
					<input type="text" name="telephone" value="<?php echo $data['telephone']; ?>" class="form-control" disabled>
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $data['email']; ?>" class="form-control" disabled>

					<label>siteweb</label>
					<input type="text" name="siteweb" value="<?php echo $data['siteweb']; ?>"
						class="form-control" disabled>

					<label>responsable</label>
					<input type="text" name="responsable" value="<?php echo $data['responsable']; ?>"
						class="form-control" disabled>
					<label>ville</label>
					<input type="text" name="ville" value="<?php echo $data['ville']; ?>"
						class="form-control" disabled>
						<label>pays</label>
					<input type="text" name="pays" value="<?php echo $data['pays']; ?>"
						class="form-control" disabled>
						<label>codepostal</label>
					<input type="text" name="codepostal" value="<?php echo $data['codepostal']; ?>"
						class="form-control" disabled>
						<label>Logo</label>
<img id="image-preview" class="img-area" src="<?php echo $data['logo']; ?>" alt="Logo Preview" style="max-width: 200px; max-height: 200px;">

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
<script type="text/javascript">
    function updatePreview(input, target) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(file);
        reader.onload = function () {
            let img = document.getElementById(target);
            // can also use "this.result"
            img.src = reader.result;
        }
    }
</script>

<?php
extract($_POST);
if (isset($cledelete)) {
	if ($cledelete != "123") {
		echo "<div class='alert alert-info' role='alert'><center>
        <h4><i class='fa-solid fa-triangle-exclamation'></i> Clé de suppression incorrecte...</h4></center></div>";
	} else {
		$r = "delete from cabinet where idc = '" . $id . "'";
		$re = "ALTER TABLE cabinet AUTO_INCREMENT = 0";
		require("../connexion.php");
		mysqli_query($con, $r);
		mysqli_query($con, $re);
		mysqli_close($con);
		require("../fonctions.php");
		redirection("cabinet-list.php");
	}
}
?>