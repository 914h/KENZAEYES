<?php
    extract($_POST);
    $name = $_FILES['logo']['name'];
    $type = $_FILES['logo']['type'];
    $size = $_FILES['logo']['size'];
    $tmp = $_FILES['logo']['tmp_name'];

    // Move uploaded file to destination directory
    $name = utf8_decode($name);
    $dossier = 'images/';
    $uploading = false;
    
    // Check if the directory exists
    if (!file_exists($dossier)) {
        echo "<br>Error: Upload directory does not exist.";
    } else {
        // Attempt to move the uploaded file
        if (move_uploaded_file($tmp, $dossier . $name)) {
            $uploading = true;
            echo "<br>Success: File uploaded successfully.";
        } else {
            // Get the last occurred error
            $lastError = error_get_last();
            if ($lastError !== null) {
                echo "<br>Error: Failed to upload file. Error message: " . $lastError['message'];
            } else {
                echo "<br>Error: Failed to upload file.";
            }
        }
    }

    // Proceed with database insertion if file upload was successful
    if ($uploading) {
        // Perform database insertion
        $logo = $name;
        $r = "INSERT INTO cabinet
            (nomcabinet, adresse, telephone, email, siteweb, responsable, specialite, ville, pays, codepostal, logo)
            VALUES
            ('$nomc', '$adresse', '$telephone', '$email', '$siteweb', '$responsable', '$specialite', '$ville', 
            '$pays', '$codepostal', '$logo')";

        require("../connexion.php");
        mysqli_query($con, $r);
        require("../fonctions.php");
        redirection("cabinet-list.php");
    }
?>
