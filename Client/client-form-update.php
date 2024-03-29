<?php
$id = $_GET['id'];
$r = "select * from client where idl = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<link rel="stylesheet" href="style.css">
<div class="container" style="margin-top:100px">
    <form method="POST" action="client-update.php">
        <fieldset>
            <legend>Formulaire Service</legend>
            <div class="row">
                <div class="col-md-6">
                    <label>Id client</label>
                    <input type="text" name="idl" value="<?php echo $data['idl']; ?>" class="form-control">
                    <input type="text" name="id" value="<?php echo $data['idl']; ?>" hidden>

                    <label>Nom</label>
                    <input type="text" name="nom" value="<?php echo $data['nom']; ?>" class="form-control">

                    <label>prenom</label>
                    <input type="text" name="prenom" value="<?php echo $data['prenom']; ?>"
                        class="form-control">

                    <label>adresse</label>
                    <input type="text" name="adresse" value="<?php echo $data['adresse']; ?>"
                        class="form-control">
                        </div>
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $data['email']; ?>"
                        class="form-control">

                    <label>Adresse</label>
                    <input type="text" name="dateNaissance" value="<?php echo $data['dateNaissance']; ?>"
                        class="form-control">

                        <label>ordonnances </label>
                <input type="file" name="photo" class="form-control" accept="image/*" onchange="updatePreview(this, 'image-preview')" >
                <img id="image-preview" class="img-area" class="square"value=<?php echo $data['ordonnances'];?>>
                    <label>historiqueAchats</label>
                    <input type="text" name="historiqueAchats" value="<?php echo $data['historiqueAchats']; ?>"
                        class="form-control">


                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </div>
</div>

</fieldset>
</form>
</div>