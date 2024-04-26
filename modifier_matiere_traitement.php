<?php
include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom_mat"];
    $id = $_POST['id_val'];

    if ($nom =="") {
        echo '<script>alert("Le nom de la matière est vide");</script>';
        echo '<script>window.location.href = "matieres.php";</script>';
    }else 
    {
        $requete = "UPDATE `matiere` SET nom='$nom' WHERE id = $id";
        if ($connexion->query($requete) === TRUE) {
            echo '<script>alert("La matière a bien été modifiée");</script>';
            echo '<script>window.location.href = "matieres.php";</script>';
        } else {
            echo "Erreur d'enregistrement : " . $connexion->error;
        }
    }
    
}

// Fermer la connexion à la base de données
$connexion->close();
?>
