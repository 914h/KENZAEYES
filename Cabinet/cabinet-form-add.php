<?php
require("../head.php");
$r = "SELECT MAX(idcabinet) AS max_id FROM cabinet";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
$next_id = $data['max_id'] + 1;
mysqli_close($con);
?>
<link rel="stylesheet" href="style.css">

<div class="container" style="margin-top: 100px;">
    <form method="POST" action="cabinet-add.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Formulaire cabinet</legend>
            <div class="row">
                <div class="col-md-6">
                    <label for="idf">ID Cabinet</label>
                    <input type="text" id="nom" name="idcabinet" value="<?php echo $next_id; ?>" class="form-control" disabled>
                    <input type="text" id="nom" name="idcabinet" value="<?php echo $next_id; ?>" class="form-control" hidden>

                    <label for="nom">Nom Cabinet</label>
                    <input type="text" id="nom" name="nomc" class="form-control">

                    <label for="contact">adresse</label>
                    <input type="text" id="contact" name="adresse" class="form-control">

                    <label for="tel">Telephone</label>
                    <input type="text" id="tel" name="telephone" class="form-control">

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control">

                    <label for="adresse">siteweb</label>
                    <input type="text" id="adresse" name="siteweb" class="form-control">

                </div>
                <div class="col-md-6">
                    <label for="ville">responsable</label>
                    <input type="text" id="ville" name="responsable" class="form-control">

                    <label for="pays">specialite</label>
                    <input type="text" id="pays" name="specialite" class="form-control">

                    <label for="typedeproduit">ville</label>
                    <input type="text" id="typedeproduit" name="ville" class="form-control">

                    <label for="conditionsdepaiement">pays</label>
                    <input type="text" id="conditionsdepaiement" name="pays" class="form-control">

                    <label for="conditiondelivraison">codepostal</label>
                    <input type="text" id="conditiondelivraison" name="codepostal" class="form-control">

                    <input type="file" name="logo" class="form-control" accept="image/*" onchange="updatePreview(this, 'image-preview')">
                    <img id="image-preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px;">
                   

                </div> <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
            </div>
        </fieldset>

    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function updatePreview(input, targetId) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.onload = function () {
            let img = document.getElementById(targetId);
            img.src = reader.result;
        };
        
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>