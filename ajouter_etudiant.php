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
        <h3>Etudiants</h3>
    </div>

    <div class="formulaire">
        <form id="myForm">
            <input type="text" placeholder="Nom et prénom" name="nom_etu"><br>
            <?php
            $requete = 
            "SELECT `id`, `nom` FROM `classe` ";
            $resultat = $connexion->query($requete);
            // Afficher les images
            echo '<select name="classe_etu" id="">
                    <option value="">Classe</option>';
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    echo'<option value="'.$row["id"].'"> '.$row["nom"].' </option>';
                }
            }
            echo "</select>";
            // Fermer la connexion à la base de données
            $connexion->close();
            ?>
            <br>
            <input type="submit" value="Envoyer" class="envoyer">
        </form>
    </div>
</body>
</html>