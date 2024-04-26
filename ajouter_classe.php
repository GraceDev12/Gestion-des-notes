<?php
include "header.php";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>
<body>
  <div id="overlay">
    <div class="progress-container" id="progressContainer">
      <div class="progress-bar" id="progressBar">0%</div>
    </div>
  </div>
  <div class="popup-container">
    <div class="popup-box">
        <h1>Info</h1>
        <p>Insertion réussie
        </p>
        <button class="close-btn">OK</button>
    </div>
  </div>
  <div class="sous_titre">
        <h3>Classes</h3>
    </div>

    <div class="formulaire">
        <form id="myForm">
            <input type="text" placeholder="Nom de la classe" name="nom_classe" id="nom_classe"><br>
            <input type="submit" value="Envoyer" class="envoyer">
        </form>
    </div>

  
</body>
</html>
