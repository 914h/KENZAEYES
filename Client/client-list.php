<?php
require("../connexion.php");
$r = "select * from client";
$res = mysqli_query($con, $r);
$nbr_client = mysqli_num_rows($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard OPTIRENT</title>
    <link rel="stylesheet" href="stylle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="main">
<div class="sidebar">
      <header>
        <img src="images/png.png" width="220px" alt="">
      </header>

      <a href="#" class="active">
        <i class="fas fa-qrcode"></i>
        <span>Dashboard</span>
      </a>

      <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-cart-shopping"></i>
          <span>Achat</span></a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="fournisseur/fournisseur-list.php">Fournisseur</a></li>
          <li><a class="dropdown-item" href="categorie/categorie-list.php">Catégorie</a></li>
          <li><a class="dropdown-item" href="Produit/Produit-list.php">Produit</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-users"></i>
          <span>Client</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Nouveau</a></li>
          <li><a class="dropdown-item" href="rendez-vous/rendez-vous-list.php">Rendez-vous</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-store"></i>
          <span>Vente</span></a>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="Commande/Commande-list,php">Commande</a></li>
          <li><a class="dropdown-item" href="paiement/paiement-list.php">Paiement</a></li>
          <li><a class="dropdown-item" href="facture/facture-list.php">Facturation</a></li>
          <li><a class="dropdown-item" href="#">Remboursement</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <a href="Fournisseur/Fournisseur-list.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fas fa-users-gear"></i>
          <span>RH</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Gestion des employés</a></li>
          <li><a class="dropdown-item" href="#">Le Pointage</a></li>
          <li><a class="dropdown-item" href="#">La paie</a></li>
          <li><a class="dropdown-item" href="#">Gestion des congés</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <a href="Produit/Produit-list.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="far fa-flag"></i>
          <span>Rapport</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Stock</a></li>
          <li><a class="dropdown-item" href="#">Ventes</a></li>
          <li><a class="dropdown-item" href="client/client-list.php">Clients</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-gear"></i>
          <span>Paramètres</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Profil cabinet</a></li>
          <li><a class="dropdown-item" href="#">Gestion des utilisateurs</a></li>
          <li><a class="dropdown-item" href="#">Configuration de l’application</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-circle-info"></i>
          <span>Aide</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Contacter le support</a></li>
          <li><a class="dropdown-item" href="#">Afficher la formation</a></li>
        </ul>
      </div>

      <a href="#">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <span>Déconnexion</span>
      </a>
    </div>
    <main>
        <div class="container page ml-5" id="page"  >
            <div class="entete-list">
                <h1 class="display-4">Liste des clients</h1>
                <span class="nbr"> 
                </span>
            </div>
            <a href="client-form-add.php?id=".urlencode($id)." class="btn btn-success ttip" data-bs-toggle="tooltip"
                title="Ajouter une client"><i class="fa-solid fa-plus"></i></a>
            <a href="client-print.php" class="btn btn-secondary" data-bs-toggle="tooltip"
                title="Imprimer tous les clients"><i class="fa-solid fa-print"></i></a>
            <br>
            <br>
            <table id="example" class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th>idl</th>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>adresse</th>
                    <th>telephone</th>  
                    <th>email</th>
                    <th>dateNaissance</th>
                    <th>ordonnances</th>
                    <th>historiqueAchats</th>
                    <th>Edit </th>
                    <th>Delete </th>
                        <th class="colm"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($res)) {
                    $id = $data['idl'];
                    echo "<tr>";
                    echo "<td>" . $data['idl'];
                    echo "<td>" . $data['nom'];
                    echo "<td>" . $data['prenom'];
                    echo "<td>" . $data['adresse'];
                    echo "<td>" . $data['telephone'];
                    echo "<td>" . $data['email'];
                    echo "<td>" . $data['dateNaissance'];
                    echo "<td>" . $data['ordonnances'];
                    echo "<td>" . $data['historiqueAchats'];
                    echo "<td> <a href=client-form-update.php?id=".urlencode($id)." data-bs-toggle='tooltip' title='Modifier cette ligne'><i class='fa-solid fa-pencil'></i></a>";
                    echo "<td> <a href=client-form-delete.php?id=".urlencode($id)." data-bs-toggle='tooltip' title='Supprimer cette ligne'><i class='fa-solid fa-trash-can iconrouge'></i></a>";
                                    }
                mysqli_close($con);
                ?>
            </tbody>
        </table>    
        </div>    
    </main>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
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
</body>