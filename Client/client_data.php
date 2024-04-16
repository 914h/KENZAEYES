<?php
require("../connexion.php");

// Fetch the value of 'ide' from the GET request
$ide = $_GET['ide'];

// Make sure to properly escape the input to prevent SQL injection
$idl = mysqli_real_escape_string($con, $ide);

// Query to fetch data based on the provided idl
$r = "SELECT * FROM client WHERE idl = '$idl'";
$res = mysqli_query($con, $r);

// Check if a matching record is found
if(mysqli_num_rows($res) > 0) {
    // Fetch the data
    $data = mysqli_fetch_assoc($res);
    
    // Prepare the response array
    $response = array(
        'idclient' => $data['idl'], 
        'nom' => $data['nom'],
        'prenom' => $data['prenom'], // Fix the concatenation here
        'telephone' => $data['telephone'],
        'email' => $data['email']
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
