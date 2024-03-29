<?php
	require("../head.php");
?>
<div class="container" style="margin-top: 100px;">
<form method="POST" action="categorie-add.php">
	<fieldset>
		<legend>Formulaire Service</legend>
		<label>Id categorie</label>
		<input type="text" name="idservice" class="form-control">
		<label>Titre</label>
		<input type="text" name="nomservice" class="form-control">
        <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer les modifications
            </button>
	</fieldset>
</form>
</div>
