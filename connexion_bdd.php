<?php

$serveur = "localhost";
  $nomUtilisateur = "root";
  $motDePasseDB = "";
  $nomDB = "gestion_notes";

  $connexion = new mysqli($serveur, $nomUtilisateur, $motDePasseDB, $nomDB);

  // Vérifier si la connexion a réussi
  if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
  }
  

?>