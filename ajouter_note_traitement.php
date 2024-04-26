<?php
include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $classe_etu = $_POST["classe_etu"];
    $id_etu = $_POST["id_etu"];
    $mat = $_POST["mat"];
    $note1 = $_POST["note1"];
    $note2 = $_POST["note2"];
    $note3 = $_POST["note3"];

    if ($classe_etu =="") {
        echo '<script>alert("La classe est vide");</script>';
        echo '<script>window.location.href = "ajouter_note.php";</script>';
    }
    elseif ($id_etu == "") {
        echo '<script>alert("L étudiant est vide");</script>';
        echo '<script>window.location.href = "ajouter_note.php";</script>';
    }
    elseif ($mat == "") {
        echo '<script>alert("La matière est vide");</script>';
        echo '<script>window.location.href = "ajouter_note.php";</script>';
    }
    elseif ($note1=="" && $note2=="") {
        echo '<script>alert("Vous devez entrer au moins deux notes");</script>';
        echo '<script>window.location.href = "ajouter_note.php";</script>';
    }
    else 
    {
        if ($note3 == "") {
            $moy = ($note1 + $note2) /2;
        }else {
            $moy = ($note1 + $note2 + $note3) / 3;
        }
        $requete = "INSERT INTO `notes`(`id_etudiant`, `id_mat`, `note1`, `note2`, `note3`, `moy`, `id_classe`)
        VALUES ('$id_etu', '$mat', '$note1', '$note2', '$note3','$moy', '$classe_etu')";
        if ($connexion->query($requete) === TRUE) {
            echo '<script>alert("La note a bien été enregistrée");</script>';
            echo '<script>window.location.href = "ajouter_note.php";</script>';
        } else {
            echo "Erreur d'enregistrement : " . $connexion->error;
        }
    }
    
}

// Fermer la connexion à la base de données
$connexion->close();
?>
