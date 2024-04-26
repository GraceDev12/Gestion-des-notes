<?php
include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom_etu"];
    $id = $_POST['id_val'];
    $classe_etu = $_POST["classe_etu"];
    if ($nom =="") {
        echo '<script>alert("Le nom de l etudiant est vide");</script>';
        echo '<script>window.location.href = "etudiants.php";</script>';
    }elseif ($classe_etu =="") {
        echo '<script>alert("Classe non choisie");</script>';
        echo '<script>window.location.href = "etudiants.php";</script>';
    }
    else
    {

        
        $requete = "UPDATE `etudiant` SET nom_et_prenom='$nom', id_classe='$classe_etu' WHERE id = $id";
        if ($connexion->query($requete) === TRUE) {
            echo '<script>alert("L étudiant a bien été modifié");</script>';
            echo '<script>window.location.href = "etudiants.php";</script>';
        } else {
            echo "Erreur d'enregistrement : " . $connexion->error;
        }
    }
    
}

// Fermer la connexion à la base de données
$connexion->close();
?>
