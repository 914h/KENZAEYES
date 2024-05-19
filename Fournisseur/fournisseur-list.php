<?php
require("../connexion.php");
$r = "select * from fournisseur";
$res = mysqli_query($con, $r);
$nbr_fournisseur = mysqli_num_rows($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard OPTIRENT</title>
    <link rel="stylesheet" href="styless.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    table, h1{
        margin-left: -10%;
    }
</style>
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
        <div class="container page" id="page">
            <div class="entete-list">
                <h1 class="display-4">Liste des fournisseurs</h1>
                <span class="nbr">
                    
                </span>
            </div>
            <a href="fournisseur-form-add.php" class="btn btn-success ttip" data-bs-toggle="tooltip"
                title="Ajouter une fournisseur"><i class="fa-solid fa-plus"></i></a>
            <a href="fournisseur-print.php" class="btn btn-secondary" data-bs-toggle="tooltip"
                title="Imprimer tous les fournisseurs"><i class="fa-solid fa-print"></i></a>
            <br>
            <br>
            <table id="example" class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                <th>ID Fournisseur</th>
                <th>Nom</th>
                <th>Contact</th>
                <th>Téléphone</th>
                <th>Email</th>  
                <th>Adresse</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Type de produit</th>
                <th>Conditions de paiement</th>
                <th>Conditions de livraison</th>
                <th>Notes</th>
                <th>Edit </th>
                    <th>Delete </th>
                    <th class="colm"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($data = mysqli_fetch_assoc($res)) {
                $id = $data['idf'];
                echo "<tr>";
                echo "<td>" . $data['idf'];
                echo "<td>" . $data['nom'];
                echo "<td>" . $data['contact'];
                echo "<td>" . $data['tel'];
                echo "<td>" . $data['email'];
                echo "<td>" . $data['adresse'];
                echo "<td>" . $data['ville'];
                echo "<td>" . $data['pays'];
                echo "<td>" . $data['typedeproduit'];
                echo "<td>" . $data['conditionsdepaiement'];
                echo "<td>" . $data['conditiondelivraison'];
                echo "<td>" . $data['notes'];
                echo "<td> <a href=fournisseur-form-update.php?id=".urlencode($id)." data-bs-toggle='tooltip' title='Modifier cette ligne'><i class='fa-solid fa-pencil'></i></a>";
                echo "<td> <a href=fournisseur-form-delete.php?id=".urlencode($id)." data-bs-toggle='tooltip' title='Supprimer cette ligne'><i class='fa-solid fa-trash-can iconrouge'></i></a>";

            }
            mysqli_close($con);
            ?>
        </tbody>
    </table>    
    
        </div>    
    </main>  
    </div>

</body>