
<link rel="stylesheet" href="style.css">
<div class="container" style="margin-top:100px">
    <form method="POST" action="produit-update.php">
        <fieldset>
        <?php
                $id=$_GET['id'];
                $r = "select * from produit where idproduit = '" . $id . "'";
                require("../connexion.php");
                $res = mysqli_query($con, $r);
                $data = mysqli_fetch_assoc($res);
                mysqli_close($con);
                require("../head.php");
                ?>
            <legend>Formulaire Service</legend>
            <label for="idf">ID Produit</label>
            <input type="text" id="nom" name="idproduit" value="<?php echo $data['idproduit']; ?>" class="form-control" disabled>
            <input type="text" id="nom" name="idproduit" value="<?php echo $data['idproduit']; ?>" class="form-control" hidden>
            

            <label for="nom">ID Categorie</label>
            <select id="idc" name="idc" class="form-control" >
                <option selected disabled ><?php echo $data['idc']; ?></option>
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
            <?php
                $id=$_GET['id'];
                $r = "select * from produit where idproduit = '" . $id . "'";
                require("../connexion.php");
                $res = mysqli_query($con, $r);
                $data = mysqli_fetch_assoc($res);
                mysqli_close($con);
                require("../head.php");
                ?>
            <label for="contact">ID fournisseur</label>
            <select  id="idf" name="idf" class="form-control" >
                <option selected disabled><?php echo $data['idf']; ?></option>
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
            <?php
                $id=$_GET['id'];
                $r = "select * from produit where idproduit = '" . $id . "'";
                require("../connexion.php");
                $res = mysqli_query($con, $r);
                $data = mysqli_fetch_assoc($res);
                mysqli_close($con);
                require("../head.php");
                ?>
                <div class="col-md-6">
                    <label>Id produit</label>
                    <input type="text" name="idproduit" value="<?php echo $data['idproduit']; ?>" class="form-control">
                    <input type="text" name="id" value="<?php echo $data['idproduit']; ?>" hidden>

                    <label>ID categorie</label>
                    <input type="text" name="idc" value="<?php echo $data['idc']; ?>" class="form-control">

                    <label>ID fournisseur</label>
                    <input type="text" name="idf" value="<?php echo $data['idf']; ?>"
                        class="form-control">

                    <label>nomproduit</label>
                    <input type="text" name="nomproduit" value="<?php echo $data['nomproduit']; ?>"
                        class="form-control">

                    <label>marque</label>
                    <input type="text" name="marque" value="<?php echo $data['marque']; ?>"
                        class="form-control">

                    <label>notes</label>
                    <input type="text" name="notes" value="<?php echo $data['notes']; ?>"
                        class="form-control">

                </div>
                <div class="col-md-6">
                    <label>prixdachat</label>
                    <input type="text" name="prixdachat" value="<?php echo $data['prixdachat']; ?>"
                        class="form-control">
                    <label>tvaappliquee</label>
                    <input type="text" name="tvaappliquee" value="<?php echo $data['tvaappliquee']; ?>"
                        class="form-control">

                    <label>prixdevente</label>
                    <input type="text" name="prixdevente" value="<?php echo $data['prixdevente']; ?>"
                        class="form-control">


                    <label>qteenstock</label>
                    <input type="text" name="qteenstock"
                        value="<?php echo $data['qteenstock']; ?>" class="form-control">

                    <label>seuildalerte</label>
                    <input type="text" name="seuildalerte"
                        value="<?php echo $data['seuildalerte']; ?>" class="form-control"><br>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </div>
</div>

</fieldset>
</form>

