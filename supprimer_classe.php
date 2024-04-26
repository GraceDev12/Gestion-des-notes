<?php

include "connexion_bdd.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['id_val'];

$requete = "DELETE FROM `classe` WHERE id LIKE $id;";
$requet = "DELETE FROM `etudiant` WHERE id_classe LIKE $id;";
$reque = "DELETE FROM `notes` WHERE id_classe LIKE $id;";

if ( $connexion->query($requete) === TRUE && $connexion->query($requet) === TRUE && $connexion->query($reque) === TRUE) {
    echo '<script>alert("La classe, les étudiants et les notes ont été supprimés avec succes");</script>';
    echo '<script>window.location.href = "classes.php";</script>';
}
}

?>