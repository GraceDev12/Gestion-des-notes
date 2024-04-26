<?php

include "connexion_bdd.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['id_val'];

$requete = "DELETE FROM `etudiant` WHERE id LIKE $id;";
$requet = "DELETE FROM `notes` WHERE id_etudiant LIKE $id;";

if ($connexion->query($requete) === TRUE && $connexion->query($requet) === TRUE) {
    echo '<script>alert("Les étudiants et les notes ont été supprimés avec succes");</script>';
    echo '<script>window.location.href = "etudiants.php";</script>';
}
}

?>