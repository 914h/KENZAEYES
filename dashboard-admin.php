<?php
session_start();
if (isset($_SESSION['v_session']) && $_SESSION['v_session'] == 1) {
} else {
  header("Location: auth.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DashBoard OPTIRENT</title>
  <!-- CSS Files -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="details.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>

<body>

  <div class="main">

    <div class="sidebar">
      <header>
        <img src="images/png.png" width="220px" alt="">
      </header>
      <div class="dropdown">
        <a href="#" class="active">
          <i class="fas fa-qrcode"></i>
          <span>Dashboard</span>
        </a>
      </div>
      <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-cart-shopping"></i>
          <span>Achat </span> <i class="fa-solid fa-sort-down"
            style="float: right; margin-top: 15px; margin-left: -10px;"></i></a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="fournisseur/fournisseur-list.php">Fournisseur</a></li>
          <li><a class="dropdown-item" href="categorie/categorie-list.php">Catégorie</a></li>
          <li><a class="dropdown-item" href="Produit/Produit-list.php">Produit</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-users"></i>
          <span>Client</span><i class="fa-solid fa-sort-down"
            style="float: right; margin-top: 15px; margin-left: -10px;"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Nouveau</a></li>
          <li><a class="dropdown-item" href="rendez-vous/rendez-vous-list.php">Rendez-vous</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-store"></i>
          <span>Vente</span><i class="fa-solid fa-sort-down"
            style="float: right; margin-top: 15px; margin-left: -10px;"></i></a>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="Commande/commande-list.php">Commande</a></li>
          <li><a class="dropdown-item" href="Paiement/paiment-list.php">Paiement</a></li>
          <li><a class="dropdown-item" href="facture/facture-list.php">Facturation</a></li>
          <li><a class="dropdown-item" href="#">Remboursement</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <a href="Fournisseur/Fournisseur-list.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fas fa-users-gear"></i>
          <span>RH</span><i class="fa-solid fa-sort-down"
            style="float: right; margin-top: 15px; margin-left: -10px;"></i>
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
          <span>Rapport</span><i class="fa-solid fa-sort-down"
            style="float: right; margin-top: 15px; margin-left: -10px;"></i>
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
          <span>Paramètres</span><i class="fa-solid fa-sort-down"
            style="float: right; margin-top: 15px; margin-left: -10px;"></i>
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
          <span>Aide</span><i class="fa-solid fa-sort-down"
            style="float: right; margin-top: 15px; margin-left: -10px;"></i>
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
    <div class="details">
      <div class="cards">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cabinet</h5>
            <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de cabinets existe dans la base de données</h6>
            <p class="card-text">
              <?php
              require ("connexion.php");
              $r1 = "SELECT COUNT(*) AS count FROM cabinet";
              $res1 = mysqli_query($con, $r1);
              $row1 = mysqli_fetch_assoc($res1);
              $table1_count = $row1['count'];
              ?>
              Nombre de cabinets : <?php echo $table1_count; ?>
            </p>
            <a href="#" class="card-link">Afficher détails</a>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Les commandes</h5>
            <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de commandes existe dans la base de données</h6>
            <p class="card-text">
              <?php
              require ("connexion.php");
              // Query to get the total number of orders
              $r1 = "SELECT COUNT(*) AS count FROM commande";
              $res1 = mysqli_query($con, $r1);
              $row1 = mysqli_fetch_assoc($res1);
              $total_count = $row1['count'];

              // Query to get the number of orders en cours
              $r2 = "SELECT COUNT(*) AS count FROM commande WHERE statut = 'en cours'";
              $res2 = mysqli_query($con, $r2);
              $row2 = mysqli_fetch_assoc($res2);
              $en_cours_count = $row2['count'];

              // Query to get the number of orders en attente
              $r3 = "SELECT COUNT(*) AS count FROM commande WHERE statut = 'en attente'";
              $res3 = mysqli_query($con, $r3);
              $row3 = mysqli_fetch_assoc($res3);
              $en_attente_count = $row3['count'];

              // Query to get the number of orders livrée
              $r4 = "SELECT COUNT(*) AS count FROM commande WHERE statut = 'livree'";
              $res4 = mysqli_query($con, $r4);
              $row4 = mysqli_fetch_assoc($res4);
              $livree_count = $row4['count'];
              ?>

            <p>
              Nombre de commandes total : <?php echo $total_count; ?><br>
              Commandes en cours : <?php echo $en_cours_count; ?><br>
              Commandes en attente : <?php echo $en_attente_count; ?><br>
              Commandes livrées : <?php echo $livree_count; ?>
            </p>
            <a href="#" class="card-link">Afficher détails</a>
            </p>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Fournisseur</h5>
            <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de fournisseurs existe dans la base de données</h6>
            <p class="card-text">
              <?php
              require ("connexion.php");
              $r1 = "SELECT COUNT(*) AS count FROM fournisseur";
              $res1 = mysqli_query($con, $r1);
              $row1 = mysqli_fetch_assoc($res1);
              $table1_count = $row1['count'];
              ?>
              Nombre de fournisseurs : <?php echo $table1_count; ?>
            </p>
            <a href="#" class="card-link">Afficher détails</a>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Produit</h5>
            <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de produits existe dans la base de données</h6>
            <p class="card-text">
              <?php
              require ("connexion.php");
              $r1 = "SELECT COUNT(*) AS count FROM produit";
              $res1 = mysqli_query($con, $r1);
              $row1 = mysqli_fetch_assoc($res1);
              $table1_count = $row1['count'];
              ?>
              Nombre de produits : <?php echo $table1_count; ?>
            </p>
            <a href="#" class="card-link">Afficher détails</a>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rendez-vous</h5>
            <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de rendez-vous existe dans la base de données</h6>
            <p class="card-text">
              <?php
              require ("connexion.php");
              $r1 = "SELECT COUNT(*) AS count FROM rendezvous";
              $res1 = mysqli_query($con, $r1);
              $row1 = mysqli_fetch_assoc($res1);
              $table1_count = $row1['count'];
              ?>
              Nombre de rendez-vous : <?php echo $table1_count; ?>
            </p>
            <a href="#" class="card-link">Afficher détails</a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


</body>