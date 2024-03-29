<?php
$id = $_GET['id'];
$r = "select * from fournisseur where idf = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<link rel="stylesheet" href="style.css">
<div class="container" style="margin-top:100px">
    <form method="POST" action="fournisseur-update.php">
        <fieldset>
            <legend>Formulaire Service</legend>

            <div class="row">
                <div class="col-md-6">
                    <label>Id</label>
                    <input type="text" name="idservice" value="<?php echo $data['idf']; ?>" class="form-control">
                    <input type="text" name="id" value="<?php echo $data['idf']; ?>" hidden>

                    <label>Nom</label>
                    <input type="text" name="nom_fournisseur" value="<?php echo $data['nom']; ?>" class="form-control">

                    <label>Contact</label>
                    <input type="text" name="contact_fournisseur" value="<?php echo $data['contact']; ?>"
                        class="form-control">

                    <label>Téléphone</label>
                    <input type="text" name="telephone_fournisseur" value="<?php echo $data['tel']; ?>"
                        class="form-control">

                    <label>Email</label>
                    <input type="text" name="email_fournisseur" value="<?php echo $data['email']; ?>"
                        class="form-control">

                    <label>Adresse</label>
                    <input type="text" name="adresse_fournisseur" value="<?php echo $data['adresse']; ?>"
                        class="form-control">



                </div>
                <div class="col-md-6">
                    <label>Ville</label>
                    <input type="text" name="ville_fournisseur" value="<?php echo $data['ville']; ?>"
                        class="form-control">
                    <label>Pays</label>
                    <input type="text" name="pays_fournisseur" value="<?php echo $data['pays']; ?>"
                        class="form-control">

                    <label>Type de produit</label>
                    <input type="text" name="type_produit_fournisseur" value="<?php echo $data['typedeproduit']; ?>"
                        class="form-control">


                    <label>Conditions de paiement</label>
                    <input type="text" name="conditions_paiement_fournisseur"
                        value="<?php echo $data['conditionsdepaiement']; ?>" class="form-control">

                    <label>Conditions de livraison</label>
                    <input type="text" name="conditions_livraison_fournisseur"
                        value="<?php echo $data['conditiondelivraison']; ?>" class="form-control">

                    <label>Notes</label>
                    <textarea name="notes_fournisseur" class="form-control"><?php echo $data['notes']; ?></textarea>


                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </div>
</div>

</fieldset>
</form>
</div>