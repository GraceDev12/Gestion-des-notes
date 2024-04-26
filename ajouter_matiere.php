<?php
include "header.php";
include "connexion_bdd.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div  class="sous_titre">
        <h3>Matière</h3>
    </div>

    <div class="formulaire">
        <form action="ajouter_matiere_traitement.php" method="post">
            <input type="text" placeholder="Nom de la matière" name="nom_mat"><br>
            <input type="submit" value="Envoyer" class="envoyer">
        </form>
    </div>
</body>
</html>
