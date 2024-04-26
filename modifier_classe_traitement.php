<?php
include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom_classe"];
    $id = $_POST['id_val'];

    if ($nom =="") {
        echo '<script>alert("Le nom de la classe est vide");</script>';
        echo '<script>window.location.href = "classes.php";</script>';
    }else 
    {
        $requete = "UPDATE `classe` SET nom='$nom' WHERE id = $id";
        if ($connexion->query($requete) === TRUE) {
            echo '<script>alert("La classe a bien été modifiée");</script>';
            echo '<script>window.location.href = "classes.php";</script>';
        } else {
            echo "Erreur d'enregistrement : " . $connexion->error;
        }
    }
    
}

// Fermer la connexion à la base de données
$connexion->close();
?>
