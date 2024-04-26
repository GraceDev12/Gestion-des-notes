<?php

include "connexion_bdd.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['id_val'];

$requete = "DELETE FROM `notes` WHERE id LIKE $id;";

if ( $connexion->query($requete) === TRUE ) {
    echo '<script>alert("La note a été supprimée avec succes");</script>';
    echo '<script>window.location.href = "notes.php";</script>';
}
}

?>