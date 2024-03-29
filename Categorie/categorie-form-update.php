<?php
	$id=$_GET['id'];
	$r = "select * from categorie where idc = '".$id."'";
	require("../connexion.php");
	$res = mysqli_query($con, $r);
	$data = mysqli_fetch_assoc($res);
	mysqli_close($con);
	require("../head.php");
?>
<div class="container" style="margin-top:100px">
<form method="POST" action="service-update.php">
	<fieldset>
		<legend>Formulaire categorie</legend>
		<label>Id categorie</label>
		<input type="text" name="idservice" value="<?php echo $data['idc']; ?>" class="form-control">
		<input type="text" name="id" value="<?php echo $data['idc']; ?>" hidden>
		<label>Nom</label>
		<input type="text" name="nomservice" value="<?php echo $data['titreC']; ?>" class="form-control">
<button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>	</fieldset>
</form>
</div>
