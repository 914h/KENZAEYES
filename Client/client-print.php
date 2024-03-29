<?php
/* Vérifier si cette page est authentifié */
// Inclure la bibliothèque FPDF
require('../fpdf/fpdf.php');

require("../connexion.php");

// Récupérer les données de la table "service"
$r = "SELECT * FROM client";
$res = mysqli_query($con, $r);

// Créer un objet FPDF
$pdf = new FPDF();
$pdf->AliasNbPages(); // Ajouter cette ligne pour définir l'alias
$pdf->AddPage();

// Définir la police
$pdf->SetFont('Arial', 'B', 16);

// Ajouter une image en haut de la page
$pdf->Image('../images/png.png', 10, 10, 0, 5);
$pdf->Ln(10);

// Titre
$pdf->Cell(0, 10, 'Liste des client', 0, 1, 'C');
$pdf->Ln(6);

// Entête du tableau
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 220, 255); // Couleur de fond de l'en-tête

// Utilisez la largeur de la page comme largeur de cellule
$cellWidth = ($pdf->GetPageWidth()-20) / 4;

$pdf->Cell($cellWidth,   3, 'idl', 1, 0, 'C', true);
$pdf->Cell($cellWidth*2, 3, 'nom', 1, 0, 'C', true);
$pdf->Cell($cellWidth*2, 3, 'prenom', 1, 0, 'C', true);
$pdf->Cell($cellWidth*2, 3, 'addresse', 1, 0, 'C', true);
$pdf->Cell($cellWidth*2, 3, 'telephone', 1, 0, 'C', true);
$pdf->Cell($cellWidth*2, 3, 'telephone', 1, 0, 'C', true);
$pdf->Cell($cellWidth*2, 3, 'email', 1, 0, 'C', true);
$pdf->Cell($cellWidth*2, 3, 'dateNaissance', 1, 0, 'C', true);
$pdf->Cell($cellWidth*2, 3, 'historiqueAchats', 1, 0, 'C', true);
$pdf->Ln();

// Afficher les données de la table
$pdf->SetFont('Arial', '', 9);
while ($data = mysqli_fetch_assoc($res)) {
    $pdf->Cell($cellWidth,   3, $data['idl'], 1);
    $pdf->Cell($cellWidth*2, 3, $data['nom'], 1);
    $pdf->Cell($cellWidth*2, 3, $data['prenom'], 1);
    $pdf->Cell($cellWidth*2, 3, $data['addresse'], 1);
    $pdf->Cell($cellWidth*2, 3, $data['telephone'], 1);
    $pdf->Cell($cellWidth*2, 3, $data['email'], 1);
    $pdf->Cell($cellWidth*2, 3, $data['dateNaissance'], 1);
    $pdf->Cell($cellWidth*2, 3, $data['ordonnances'], 1);
    $pdf->Cell($cellWidth*2, 3, $data['historiqueAchats'], 1);
    $pdf->Ln();
}

// Numéro de page
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0,10, 'Page ' . $pdf->PageNo() . ' sur {nb}', 0, 0, 'L');


// Fermer la connexion à la base de données
mysqli_close($con);

// Afficher le PDF dans le navigateur
$pdf->Output();

?>
