<?php
require("../connexion.php");
$r = "select * from rendezvous";
$res = mysqli_query($con, $r);
$nbr_cabinet = mysqli_num_rows($res);

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

</head>
<body>
<div class="main">
      <div class="sidebar">
        <header><img src="images/png.png" width="220px" alt=""></header>
        <a href="#" class="active">
            <i class="fas fa-qrcode"></i>
            <span>Dashboard</span>
        </a>
        <a href="#">
            <i class="fas fa-link"></i>
            <span>Shortcuts</span>
        </a>
        <a href="#">
            <i class="fas fa-stream"></i>
            <span>Overview</span>
        </a>
        <a href="#">
            <i class="fas fa-calendar"></i>
            <span>Events</span>
        </a>
        <a href="#">
            <i class="far fa-question-circle"></i>
            <span>About</span>
        </a>
        <a href="#">
            <i class="fas fa-sliders-h"></i>
            <span>Services</span>
        </a>
        <a href="#">
            <i class="far fa-envelope"></i>
            <span>Contact</span>
        </a>
    </div>
    <main>
        <div class="container page" id="page" style="margin-top: 100px;">
            <div class="entete-list">
                <h1 class="display-4">Liste des Rendez vous</h1>
                <span class="nbr">
                    
                </span>
            </div>
            <a href="rendez-vous-form-add.php" class="btn btn-success ttip" data-bs-toggle="tooltip"
                title="Ajouter une cabinet"><i class="fa-solid fa-plus"></i></a>
            <a href="rendez-vous-print.php" class="btn btn-secondary" data-bs-toggle="tooltip"
                title="Imprimer tous les cabinets"><i class="fa-solid fa-print"></i></a>
            <br>
            <br>
            <table id="example" class="table  table-striped table-hover">
            <thead>
                <tr>
                <th>ID Rendez-vous</th>
                <th>ID Client</th>
                <th>ID Cabinet</th> 
                <th>Date de rendezvous</th>
                <th>Heure de Rendezvous</th> 
                <th>notes</th>
                <th>niveau de credibilite</th>
                <th>Edit </th>
                    <th>Delete </th>
                    <th class="colm"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($data = mysqli_fetch_assoc($res)) {
                $id= $data['idrendezvous'];
                echo "<tr>";
                echo "<td>" . $data['idrendezvous'];
                echo "<td>" . $data['idcabinet'];
                echo "<td>" . $data['idrendezvous'];
                echo "<td>" . $data['daterendezvous'];
                echo "<td>" . $data['heurerendezvous'];
                echo "<td>" . $data['notes'];
                echo "<td>" . $data['niveaudecredibilite'];
                echo "<td> <a href=rendez-vous-form-update.php?id=".urlencode($id)." data-bs-toggle='tooltip' title='Modifier cette ligne'><i class='fa-solid fa-pencil'></i></a>";
                echo "<td> <a href=rendez-vous-form-delete.php?id=".urlencode($id)." data-bs-toggle='tooltip' title='Supprimer cette ligne'><i class='fa-solid fa-trash-can iconrouge'></i></a>";

            }
            mysqli_close($con);
            ?>
        </tbody>
    </table>    
    
        </div>    
    </main>  
    </div>
</body>