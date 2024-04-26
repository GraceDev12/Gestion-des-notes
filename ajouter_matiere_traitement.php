<?php
include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom_mat"];
    if ($nom =="") {
        echo '<script>alert("Le nom de la classe est vide");</script>';
        echo '<script>window.location.href = "ajouter_matiere.php";</script>';
    }
    else
    {
        $requete = "INSERT INTO `matiere`(`nom`) 
        VALUES ('$nom')";
        if ($connexion->query($requete) === TRUE) {
            echo '<script>alert("La matière a bien été enregistrée");</script>';
            echo '<script>window.location.href = "ajouter_matiere.php";</script>';
        } else {
            echo "Erreur d'enregistrement : " . $connexion->error;
        }
    }
    
}

// Fermer la connexion à la base de données
$connexion->close();
?>
