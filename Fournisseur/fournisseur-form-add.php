<?php
require("../head.php");
?>
<link rel="stylesheet" href="style.css">

<div class="container" style="margin-top: 100px;">
    <form method="POST" action="fournisseur-add.php">
        <fieldset>
            <legend>Formulaire fournisseur</legend>
            <div class="row">
                <div class="col-md-6">
                    <label for="idf">ID Fournisseur</label>
                    <input type="text" id="idf" name="idf" class="form-control">

                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control">

                    <label for="contact">Contact</label>
                    <input type="text" id="contact" name="contact" class="form-control">

                    <label for="tel">tel</label>
                    <input type="text" id="tel" name="tel" class="form-control">

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control">

                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" class="form-control">

                </div>
                <div class="col-md-6">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville" class="form-control">

                    <label for="pays">Pays</label>
                    <input type="text" id="pays" name="pays" class="form-control">

                    <label for="typedeproduit">Type de produit</label>
                    <input type="text" id="typedeproduit" name="typedeproduit" class="form-control">

                    <label for="conditionsdepaiement">Conditions de paiement</label>
                    <input type="text" id="conditionsdepaiement" name="conditionsdepaiement" class="form-control">

                    <label for="conditiondelivraison">Conditions de livraison</label>
                    <input type="text" id="conditiondelivraison" name="conditiondelivraison" class="form-control">

                    <label for="notes">Notes</label>
                    <textarea id="notes" name="notes" class="form-control"></textarea>

                   

                </div> <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
            </div>
        </fieldset>

    </form>
</div>