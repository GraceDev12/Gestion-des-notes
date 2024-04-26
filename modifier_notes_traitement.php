<?php
include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $note1 = $_POST["note1"];
    $note2 = $_POST["note2"];
    $note3 = $_POST["note3"];
    $id = $_POST["id_val"];

    if ($note1=="" && $note2=="") {
        echo '<script>alert("Vous devez entrer au moins deux notes");</script>';
        echo '<script>window.location.href = "notes.php";</script>';
    }
    else 
    {
        if ($note3 == "") {
            $moy = ((int)$note1 + (int)$note2) /2;
        }else {
            $moy = ((int)$note1 + (int)$note2 + (int)$note3) / 3;
        }
        $requete = "UPDATE `notes` SET note1='$note1',note2='$note2', note3='$note3', moy='$moy' WHERE id = $id";
        if ($connexion->query($requete) === TRUE) {
            echo '<script>alert("La note a bien été modifiée");</script>';
            echo '<script>window.location.href = "notes.php";</script>';
        } else {
            echo "Erreur d'enregistrement : " . $connexion->error;
        }
    }
    
}

// Fermer la connexion à la base de données
$connexion->close();
?>
