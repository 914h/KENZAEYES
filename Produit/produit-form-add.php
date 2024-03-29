<?php
require ("../head.php");
$r = "SELECT MAX(idp) AS max_id FROM produit";
require ("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
$next_id = $data['max_id'] + 1;
mysqli_close($con);
?>
<link rel="stylesheet" href="style.css">

<div class="container" style="margin-top: 100px;">
    <form method="POST" action="produit-add.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Formulaire Produit</legend>
            <label for="idf">ID Produit</label>
            <input type="text" id="nom" name="idp" value="<?php echo $next_id; ?>" class="form-control" disabled>
            <input type="text" id="nom" name="idp" value="<?php echo $next_id; ?>" class="form-control" hidden>

            <label for="nom">ID Categorie</label>
            <select id="idc" name="idc" class="form-control" >
                <option selected disabled>Sélectionnez un Categorie</option>
                <?php
                require ("../connexion.php");
                $r = "select * from categorie";
                $res = mysqli_query($con, $r);
                while ($data = mysqli_fetch_assoc($res)) {
                    echo "<option value=" . $data['idc'] . ">";
                    echo $data['idc'] . " | " . $data['titreC'];
                }
                mysqli_close($con);
                ?>
            </select>
            <label for="contact">ID fournisseur</label>
            <select  id="idf" name="idf" class="form-control" >
                <option selected disabled>Sélectionnez un fournisseur</option>
                <?php
                require ("../connexion.php");
                $r = "select * from fournisseur";
                $res = mysqli_query($con, $r);
                while ($data = mysqli_fetch_assoc($res)) {
                    echo "<option value=" . $data['idf'] . ">";
                    echo $data['idf'] . " | " . $data['nom'] . " | " . $data['contact'];
                }
                mysqli_close($con);
                ?>
            </select>
            <div class="row">
                <div class="col-md-6">

                    <label for="tel">nomproduit</label>
                    <input type="text" id="tel" name="nomproduit" class="form-control">

                    <label for="email">marque</label>
                    <input type="text" id="email" name="marque" class="form-control">

                    <label for="adresse">notes</label>
                    <input type="text" id="adresse" name="notes" class="form-control">
                    <label for="ville">prixdachat</label>
                    <input type="text" id="ville" name="prixdachat" class="form-control">

                </div>
                <div class="col-md-6">

                    <label for="pays">tvaappliquee</label>
                    <input type="text" id="pays" name="tvaappliquee" class="form-control">
                    <label for="typedeproduit">prixdevente</label>
                    <input type="text" id="typedeproduit" name="prixdevente" class="form-control">

                    <label for="conditionsdepaiement">qteenstock</label>
                    <input type="text" id="conditionsdepaiement" name="qteenstock" class="form-control">

                    <label for="conditiondelivraison">seuildalerte</label>
                    <input type="text" id="conditiondelivraison" name="seuildalerte" class="form-control"><br>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </div>
        </fieldset>

    </form>
</div>