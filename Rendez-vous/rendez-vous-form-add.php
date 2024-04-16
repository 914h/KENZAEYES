<?php
require ("../head.php");
$r = "SELECT MAX(idrendezvous) AS max_id FROM rendezvous";
require ("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
$next_id = $data['max_id'] + 1;
mysqli_close($con);
?>
<link rel="stylesheet" href="style.css">

<div class="container" style="margin-top: 100px;">
    <form method="POST" action="rendez-vous-add.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Formulaire Produit</legend>
            <label for="idf">ID Produit</label>
            <input type="text" id="nom" name="idp" value="<?php echo $next_id; ?>" class="form-control" disabled>
            <input type="text" id="nom" name="idp" value="<?php echo $next_id; ?>" class="form-control" hidden>

            
            <div class="row">
            <div class="col-md-6">
            <label for="nom">ID Client</label>
            <select id="idclient" name="idclient" class="form-control" onchange="afficher_infos_client()">
                <option selected disabled>Sélectionnez un Client</option>
                <?php
                require ("../connexion.php");
                $r = "select * from Client";
                $res = mysqli_query($con, $r);
                while ($data = mysqli_fetch_assoc($res)) {
                    echo "<option value=" . $data['idl'] . ">";
                    echo $data['idl'] . " | Mr. " . $data['nom'] . " " . $data['prenom'];
                }
                mysqli_close($con);
                ?>
            </select>
            <div id="infos_client"></div>
            
            </div>
            <div class="col-md-6">
            <label for="contact">ID Cabinet</label>
            <select id="idcabinet" name="idcabinet" class="form-control" onchange="afficher_infos_cabinet()">
                <option selected disabled>Sélectionnez un Cabinet</option>
                <?php
                require ("../connexion.php");
                $r = "select * from Cabinet";
                $res = mysqli_query($con, $r);
                while ($data = mysqli_fetch_assoc($res)) {
                    echo "<option value=" . $data['idcabinet'] . ">";
                    echo $data['idcabinet'] . " | " . $data['nomcabinet'];
                }
                mysqli_close($con);
                ?>
            </select>
            <div id="infos_cabinet"></div>
            </div>
                <div class="col-md-6">
                    <label for="tel">Date de rendez vous</label>
                    <input type="date" id="daterendezvous" name="daterendezvous" class="form-control">
                    <label for="email">Heure de rendez vous</label>
                    <input type="time" id="heurerendezvous" name="heurerendezvous" class="form-control">
                    
                </div>
                <div class="col-md-6">
                    <label for="adresse">notes</label>
                    <input type="text" id="notes" name="notes" class="form-control">
                    <label for="ville">niveaudecredibilite</label>
                    <input type="text" id="niveaudecredibilite" name="niveaudecredibilite" class="form-control">
                </div>
                <br><button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
            </div>
        </fieldset>
    </form>
</div>

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
