<?php 
require('../fpdf/fpdf.php');
require('../connexion.php');
$r = 'select * from fournisseur';
$res = mysqli_query($con, $r);
class PDF extends FPDF
{
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' sur {nb}', 0, 0, 'R');
    }
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');$pdf->SetFont('Arial', 'B', 16);
$pdf->Image('../images/png.png', 10, 10, 0, 5);
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Liste des fournisseur', 0, 1, 'C');
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 220, 255); 
$cellWidth = ($pdf->GetPageWidth()-20) / 12;
$pdf->SetFont('Arial', '', 12);
while ($data = mysqli_fetch_assoc($res))
{
$cellWidth = ($pdf->GetPageWidth()-20);$pdf->Cell(50, 8, 'ide', 0);
$pdf->Cell($cellWidth, 8, $data['idf'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'nom', 0);
$pdf->Cell($cellWidth, 8, $data['nom'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'contact', 0);
$pdf->Cell($cellWidth, 8, $data['contact'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'tel', 0);
$pdf->Cell($cellWidth, 8, $data['tel'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'email', 0);
$pdf->Cell($cellWidth, 8, $data['email'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'adresse', 0);
$pdf->Cell($cellWidth, 8, $data['adresse'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'ville', 0);
$pdf->Cell($cellWidth, 8, $data['ville'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'pays', 0);
$pdf->Cell($cellWidth, 8, $data['pays'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'typedeproduit', 0);
$pdf->Cell($cellWidth, 8, $data['typedeproduit'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'conditionsdepaiement', 0);
$pdf->Cell($cellWidth, 8, $data['conditionsdepaiement'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'conditiondelivraison', 0);
$pdf->Cell($cellWidth, 8, $data['conditiondelivraison'], 0);
$pdf->Ln();$pdf->Cell(50, 8, 'notes', 0);
$pdf->Cell($cellWidth, 8, $data['notes'], 0);

$pdf->Ln();$pdf->Line(10, $pdf->GetY(), $pdf->GetPageWidth() - 10, $pdf->GetY());
}
mysqli_close($con);
$pdf->Output();
?>