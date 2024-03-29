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
            <label for="idf">ID rendezvous</label>
            <input type="text" id="nom" name="idp" value="<?php echo $data['idrendezvous']; ?>" class="form-control"
                disabled>
            <input type="text" id="nom" name="idp" value="<?php echo $data['idrendezvous']; ?>" class="form-control"
                hidden>

            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <label for="tel">Date de rendez vous</label>
                <input type="date" id="daterendezvous" name="daterendezvous" class="form-control">
                <label for="email">Heure de rendez vous</label>
                <input type="time" id="heurerendezvous" name="heurerendezvous" class="form-control">

            </div>

            <label for="nom">ID Cabinet</label>
            <select id="idc" name="idc" class="form-control" onchange="afficher_infos_cabinet()">
                <option selected disabled>
                    <?php echo $data['idcabinet']; ?>
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
            <label for="nom">ID Client</label>
            <select id="idc" name="idc" class="form-control" onchange="afficher_infos_client()">
                <option selected disabled>
                    <?php echo $data['idl']; ?>
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
            <div id="infos_cabinet"></div>

                <div class="col-md-6">
                    <label>daterendezvous</label>
                    <input type="text" name="prixdachat" value="<?php echo $data['daterendezvous']; ?>"
                        class="form-control">
                    <label>heurerendezvous</label>
                    <input type="text" name="heurerendezvous" value="<?php echo $data['heurerendezvous']; ?>"
                        class="form-control">

                    <label>notes</label>
                    <input type="text" name="notes" value="<?php echo $data['notes']; ?>"
                        class="form-control">


                    <label>niveaudecredibilite</label>
                    <input type="text" name="qteenstock" value="<?php echo $data['niveaudecredibilite']; ?>"
                        class="form-control">

                    <label>seuildalerte</label>
                    <input type="text" name="seuildalerte" value="<?php echo $data['seuildalerte']; ?>"
                        class="form-control"><br>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </div>
</div>

</fieldset>
</form>