<?php
include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom_classe"];
    if ($nom =="") {
        echo '<script>alert("Le nom de la classe est vide");</script>';
        echo '<script>window.location.href = "ajouter_classe.php";</script>';
    }else 
    {
        $requete = "INSERT INTO `classe`(`nom`) 
        VALUES ('$nom')";
        if ($connexion->query($requete) === TRUE) {
            echo '<script>alert("La classe a bien été enregistrée");</script>';
            echo '<script>window.location.href = "ajouter_classe.php";</script>';
        } else {
            echo "Erreur d'enregistrement : " . $connexion->error;
        }
    }
    
}

// Fermer la connexion à la base de données
$connexion->close();
?>



