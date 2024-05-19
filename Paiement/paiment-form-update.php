<link rel="stylesheet" href="style.css">
<div class="container" style="margin-top:100px">
    <form method="POST" action="paiment-update.php">
        <fieldset>
            <?php
            $id = $_GET['id'];
            $r = "select * from paiement where idpaiement = '" . $id . "'";
            require ("../connexion.php");
            $res = mysqli_query($con, $r);
            $data = mysqli_fetch_assoc($res);
            mysqli_close($con);
            require ("../head.php");
            ?>
            <legend>Formulaire paiement</legend>
            <div class="row">
            <div class="col-md-6">
                <label for="idf">ID paiement</label>
                <input type="text" id="nom" name="idp" value="<?php echo $data['idpaiement']; ?>" class="form-control"
                    disabled>
                <input type="text" id="nom" name="idp" value="<?php echo $data['idpaiement']; ?>" class="form-control"
                    hidden>
            </div>
                <div class="col-md-6">
                    <label for="nom">ID Commande</label>
                    <select id="idc" name="idproduit" class="form-control" onchange="afficher_infos_cabinet()">
                        <option selected disabled>
                            <?php echo $data['idcommande']; ?>
                        </option>
                        <?php
                        require ("../connexion.php");
                        $r = "select * from commande";
                        $res = mysqli_query($con, $r);
                        while ($data = mysqli_fetch_assoc($res)) {
                            echo "<option value=" . $data['idcommande'] . ">";
                            echo $data['idcommande'] . " | " . $data['statut'];
                        }
                        mysqli_close($con);
                        ?>
                    </select>
                    <div id="infos_cabinet"></div>
                </div>
                <?php
                $id = $_GET['id'];
                $r = "select * from paiement where idpaiement = '" . $id . "'";
                require ("../connexion.php");
                $res = mysqli_query($con, $r);
                $data = mysqli_fetch_assoc($res);
                mysqli_close($con);
                require ("../head.php");
                ?>
                <div class="col-md-6">
                    <label>date de paiement</label>
                    <input type="date" name="datepaiement" value="<?php echo $data['datepaiement']; ?>"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>montantpaye</label>
                    <input type="text" name="statut" value="<?php echo $data['montantpaye']; ?>" class="form-control">


                   
                </div>
                <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
            </div>
            
</div>
</div>

</fieldset>
</form>
<script>
    function afficher_infos_client() {
        var client_slct = document.getElementById("idclient");
        var selectedOption = client_slct.options[client_slct.selectedIndex];
        var infos_client = document.getElementById("infos_client");
        var ide = selectedOption.value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                var reponse = JSON.parse(xhr.responseText);
                var idclient = reponse.idclient;
                var nom = reponse.nom;
                var prenom = reponse.prenom;
                var email = reponse.email;
                var telephone = reponse.telephone;
                var adresse = reponse.adresse;

                var detailshtml = "Id Client : <strong>" + idclient + "</strong><br>"
                    + "Nom : <strong>" + nom + "</strong><br>"
                    + "Prénom : <strong>" + prenom + "</strong><br>"
                    + "Email : <strong>" + email + "</strong><br>"
                    + "Téléphone : <strong>" + telephone + "</strong><br>";
                infos_client.innerHTML = detailshtml;
            }
        };

        xhr.open("GET", "../client/client_data.php?ide=" + ide, true);
        xhr.send();
    }

    function afficher_infos_cabinet() {
        var cabinet_slct = document.getElementById("idcabinet");
        var selectedOption = cabinet_slct.options[cabinet_slct.selectedIndex];
        var infos_cabinet = document.getElementById("infos_cabinet");
        var ide = selectedOption.value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                var reponse = JSON.parse(xhr.responseText);
                var idcabinet = reponse.idcabinet;
                var nomcabinet = reponse.nomcabinet;
                var responsable = reponse.responsable;
                var telephone = reponse.telephone;
                var logo = reponse.logo;
                var email = reponse.email;

                var detailshtml = "ID Cabinet: <strong>" + idcabinet + "</strong><br>" +
                    "Nom Cabinet: <strong>" + nomcabinet + "</strong><br>" +
                    "Responsable: <strong>" + responsable + "</strong><br>" +
                    "Téléphone: <strong>" + telephone + "</strong><br>" +
                    "Email: <strong>" + email + "</strong><br>" +
                    "<img src='" + logo + "' alt='Logo' width='100'><br>";

                infos_cabinet.innerHTML = detailshtml;
            }
        };

        xhr.open("GET", "../cabinet/cabinet_data.php?ide=" + ide, true);
        xhr.send();
    }
</script>