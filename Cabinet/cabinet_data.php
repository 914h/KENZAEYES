<?php
require("../connexion.php");

// Fetch the value of 'ide' from the GET request
$ide = $_GET['ide'];

// Make sure to properly escape the input to prevent SQL injection
$idcabinet = mysqli_real_escape_string($con, $ide);

// Query to fetch data based on the provided idcabinet
$r = "SELECT * FROM Cabinet WHERE idcabinet = '$idcabinet'";
$res = mysqli_query($con, $r);

// Check if a matching record is found
if(mysqli_num_rows($res) > 0) {
    // Fetch the data
    $data = mysqli_fetch_assoc($res);
    
    // Prepare the response array
    $response = array(
        'idcabinet' => $data['idcabinet'], 
        'nomcabinet' => $data['nomcabinet'],
        'responsable' => $data['responsable'],
        'telephone' => $data['telephone'],
        'logo' => '/KENZAEYES/Cabinet/images/' . $data['logo'], // Assuming the logo path is stored in the database
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
