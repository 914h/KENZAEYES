<?php
$id = $_GET['id'];
$r = "select * from cabinet where idc = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<link rel="stylesheet" href="style.css">
<div class="container" style="margin-top:100px">
    <form method="POST" action="cabinet-update.php">
        <fieldset>
            <legend>Formulaire Service</legend>

            <div class="row">
                <div class="col-md-6">
                    <label>Id Cabinet</label>
                    <input type="text" name="idservice" value="<?php echo $data['idc']; ?>" class="form-control">
                    <input type="text" name="id" value="<?php echo $data['idc']; ?>" hidden>

                    <label>Nom Cabinet</label>
                    <input type="text" name="nom_fournisseur" value="<?php echo $data['nomc']; ?>" class="form-control">

                    <label>adresse</label>
                    <input type="text" name="contact_fournisseur" value="<?php echo $data['adresse']; ?>"
                        class="form-control">

                    <label>Telephone</label>
                    <input type="text" name="telephone_fournisseur" value="<?php echo $data['telephone']; ?>"
                        class="form-control">

                    <label>Email</label>
                    <input type="text" name="email_fournisseur" value="<?php echo $data['email']; ?>"
                        class="form-control">

                    <label>siteweb</label>
                    <input type="text" name="adresse_fournisseur" value="<?php echo $data['siteweb']; ?>"
                        class="form-control">

                </div>
                <div class="col-md-6">
                    <label>responsable</label>
                    <input type="text" name="ville_fournisseur" value="<?php echo $data['responsable']; ?>"
                        class="form-control">
                    <label>specialite</label>
                    <input type="text" name="pays_fournisseur" value="<?php echo $data['specialite']; ?>"
                        class="form-control">

                    <label>ville</label>
                    <input type="text" name="type_produit_fournisseur" value="<?php echo $data['ville']; ?>"
                        class="form-control">


                    <label>pays</label>
                    <input type="text" name="conditions_paiement_fournisseur"
                        value="<?php echo $data['pays']; ?>" class="form-control">

                    <label>codepostal</label>
                    <input type="text" name="conditions_livraison_fournisseur"
                        value="<?php echo $data['codepostal']; ?>" class="form-control">

                    <label>logo</label>
                    <input type="file" name="photo" class="form-control" accept="image/*" onchange="updatePreview(this, 'image-preview')" >
                    <img id="image-preview" class="img-area" class="square"value=<?php echo $data['logo'];?>>


                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </div>
</div>

</fieldset>
</form>
</div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
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
