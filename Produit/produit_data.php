<?php
require("../connexion.php");

// Fetch the value of 'ide' from the GET request
$ide = $_GET['ide'];

// Make sure to properly escape the input to prevent SQL injection
$idcabinet = mysqli_real_escape_string($con, $ide);

// Query to fetch data based on the provided idcabinet
$r = "SELECT * FROM produit WHERE idproduit = '$idcabinet'";
$res = mysqli_query($con, $r);

// Check if a matching record is found
if(mysqli_num_rows($res) > 0) {
    // Fetch the data
    $data = mysqli_fetch_assoc($res);
    
    // Prepare the response array
    $response = array(
        'idproduit' => $data['idproduit'], 
        'nomproduit' => $data['nomproduit'],
        'marque' => $data['marque'],
        'prixdevente' => $data['prixdevente'],
        'qteenstock' => $data['qteenstock'],
    );
    
    // Send the response as JSON
    echo json_encode($response);
} else {
    // If no matching record is found, return an empty response
    echo json_encode(array());
}

// Close the database connection
mysqli_close($con);
?>
