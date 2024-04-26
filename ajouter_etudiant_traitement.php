<?php
include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom_etu"];
    $classe_etu = $_POST["classe_etu"];
    if ($nom =="") {
        echo '<script>alert("Le nom de l etudiant est vide");</script>';
        echo '<script>window.location.href = "ajouter_etudiant.php";</script>';
    }elseif ($classe_etu =="") {
        echo '<script>alert("Classe non choisie");</script>';
        echo '<script>window.location.href = "ajouter_etudiant.php";</script>';
    }
    else
    {
        $requete = "INSERT INTO `etudiant`(`nom_et_prenom`, `id_classe`) 
        VALUES ('$nom', '$classe_etu')";
        if ($connexion->query($requete) === TRUE) {
            echo '<script>alert("L étudiant a bien été enregistrée");</script>';
            echo '<script>window.location.href = "ajouter_etudiant.php";</script>';
        } else {
            echo "Erreur d'enregistrement : " . $connexion->error;
        }
    }
    
}

// Fermer la connexion à la base de données
$connexion->close();
?>
