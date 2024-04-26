<?php

include "connexion_bdd.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['id_val'];

$requete = "DELETE FROM `matiere` WHERE id LIKE $id;";
$requet = "DELETE FROM `notes` WHERE id_mat LIKE $id;";

if ( $connexion->query($requete) === TRUE && $connexion->query($requet) === TRUE) {
    echo '<script>alert("La matière et les notes ont été supprimés avec succes");</script>';
    echo '<script>window.location.href = "matieres.php";</script>';
}
}

?>