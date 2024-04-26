a<?php
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
        <h3>Notes</h3>
    </div>

    <div class="formulaire">
        <form action="ajouter_note_traitement.php" method="post">
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

            $requet = 
            "SELECT `id`, `nom_et_prenom` as nom FROM `etudiant` ";
            $resultat = $connexion->query($requet);
            // Afficher les images
            echo '<select name="id_etu" id="">
                    <option value="">Etudiant</option>';
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    echo'<option value="'.$row["id"].'"> '.$row["nom"].' </option>';
                }
            }
            echo "</select>";

            $requete = 
            "SELECT `id`, `nom` FROM `matiere` ";
            $resultat = $connexion->query($requete);
            // Afficher les images
            echo '<select name="mat" id="">
                    <option value="">Matiere</option>';
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    echo'<option value="'.$row["id"].'"> '.$row["nom"].' </option>';
                }
            }
            echo "</select>";
            
            ?>
            <br>
            
            <input type="number" placeholder="Note 1" name="note1"><br>
            <input type="number" placeholder="Note 2" name="note2"><br>
            <input type="number" placeholder="Note 3" name="note3"><br>
            <input type="submit" value="Envoyer" class="envoyer">
        </form>
    </div>
</body>
</html>