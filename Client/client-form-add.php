<?php
require("../head.php");
$r = "SELECT MAX(idl) AS max_id FROM client";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
$next_id = $data['max_id'] + 1;
mysqli_close($con);
?>
<link rel="stylesheet" href="style.css">

<div class="container" >
    <form method="POST" action="client-add.php">
        <fieldset>
            <legend>Formulaire fournisseur</legend>
            <div class="row">
                <div class="col-md-6">
                    <label for="nom">Id client</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $next_id; ?>" class="form-control" disabled>
                    <input type="text" id="nom" name="nom" value="<?php echo $next_id; ?>" class="form-control" hidden>

                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control">

                    <label for="Prenom">Prenom</label>
                    <input type="text" id="Prenom" name="Prenom" class="form-control">

                    <label for="tel">adresse</label>
                    <input type="text" id="adresse" name="adresse" class="form-control">

                    <label for="email">telephone</label>
                    <input type="text" id="telephone" name="telephone" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="adresse">email</label>
                    <input type="text" id="email" name="email" class="form-control">

                    <label for="ville">dateNaissance</label>
                    <input type="date   " id="dateNaissance" name="dateNaissance" class="form-control">

                    <label>ordonnances</label>
                <input type="file" name="ordonnances" class="form-control" accept="image/*" onchange="updatePreview(this, 'image-preview')" >

                    <label for="typedeproduit">historiqueAchats</label>
                    <input type="text" id="historiqueAchats" name="historiqueAchats" class="form-control">

                </div>
            </div>



            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </fieldset>

    </form>
</div>