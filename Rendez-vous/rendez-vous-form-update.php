<link rel="stylesheet" href="style.css">
<div class="container" style="margin-top:100px">
    <form method="POST" action="rendezvous-update.php">
        <fieldset>
            <?php
            $id = $_GET['id'];
            $r = "select * from rendezvous where idrendezvous = '" . $id . "'";
            require ("../connexion.php");
            $res = mysqli_query($con, $r);
            $data = mysqli_fetch_assoc($res);
            mysqli_close($con);
            require ("../head.php");
            ?>
            <legend>Formulaire Service</legend>
            <div class="row">
                <label for="idf">ID rendezvous</label>
                <input type="text" id="nom" name="idp" value="<?php echo $data['idrendezvous']; ?>" class="form-control"
                    disabled>
                <input type="text" id="nom" name="idp" value="<?php echo $data['idrendezvous']; ?>" class="form-control" hidden>

                <div class="col-md-6">
                    <label for="nom">ID Cabinet</label>
                    <?php
            $id = $_GET['id'];
            $r = "select * from cabinet where idcabinet = '" . $id . "'";
            require ("../connexion.php");
            $res = mysqli_query($con, $r);
            $data = mysqli_fetch_assoc($res);
            mysqli_close($con);
            require ("../head.php");
            ?>
                    <select id="idc" name="idc" class="form-control" onchange="afficher_infos_cabinet()">
                        <option selected disabled>
                        
                            <?php  echo $data['idcabinet'] . " | " . $data['nomcabinet']; ?>
                        </option>
                        <?php
                        require ("../connexion.php");
                        $r = "select * from Cabinet";
                        $res = mysqli_query($con, $r);
                        while ($data = mysqli_fetch_assoc($res)) {
                            echo "<option value=" . $data['idc'] . ">";
                            echo $data['idcabinet'] . " | " . $data['nomcabinet'];
                        }
                        mysqli_close($con);
                        ?>
                    </select>
                    <div id="infos_cabinet"></div>
                </div><?php
            $id = $_GET['id'];
            $r = "select * from rendezvous where idrendezvous = '" . $id . "'";
            require ("../connexion.php");
            $res = mysqli_query($con, $r);
            $data = mysqli_fetch_assoc($res);
            mysqli_close($con);
            require ("../head.php");
            ?>
                <div class="col-md-6">
                    <label for="nom">ID Client</label>
                    <?php
            $id = $_GET['id'];
            $r = "select * from client where idl = '" . $id . "'";
            require ("../connexion.php");
            $res = mysqli_query($con, $r);
            $data = mysqli_fetch_assoc($res);
            mysqli_close($con);
            require ("../head.php");
            ?>
                    <select id="idc" name="idc" class="form-control" onchange="afficher_infos_client()">
                        <option selected disabled>
                        
                            <?php echo $data['idl']  . " | " . $data['nom'] . " " . $data['prenom']; ?>
                        </option>
                        <?php
                        require ("../connexion.php");
                        $r = "select * from client";
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
                <?php
            $id = $_GET['id'];
            $r = "select * from rendezvous where idrendezvous = '" . $id . "'";
            require ("../connexion.php");
            $res = mysqli_query($con, $r);
            $data = mysqli_fetch_assoc($res);
            mysqli_close($con);
            require ("../head.php");
            ?>
                <div class="col-md-6">
                    <label>daterendezvous</label>
                    <input type="date" name="daterendezvous" value="<?php echo $data['daterendezvous']; ?>"
                        class="form-control">
                   

                    <label>notes</label>
                    <input type="text" name="notes" value="<?php echo $data['notes']; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                <label>heurerendezvous</label>
                    <input type="time" name="heurerendezvous" value="<?php echo $data['heurerendezvous']; ?>"
                        class="form-control">
                    <label>niveaudecredibilite</label>
                    <input type="text" name="niveaudecredibilite" value="<?php echo $data['niveaudecredibilite']; ?>"
                        class="form-control">


                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
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
