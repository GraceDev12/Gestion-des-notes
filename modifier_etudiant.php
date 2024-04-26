<?php
include "header.php";
include "connexion_bdd.php";
$id = $_POST['id_val'];
            $requete = 
            "SELECT `id`, `nom_et_prenom` FROM `etudiant` WHERE id LIKE $id";
            $resultat = $connexion->query($requete);
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    $nom = $row["nom_et_prenom"];
                }
            }

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
        <h3>Classes</h3>
    </div>

    <div class="formulaire">
        <form action="modifier_etudiant_traitement.php" method="post">
            <label for="">Nom</label>
            <input type="text" placeholder="Nom de l etudiant" name="nom_etu" value = "<?php echo $nom ?>"><br>
            <input type="text"  name="id_val" value = "<?php echo $id ?>"hidden><br>
            <label for="">Classe</label>
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
            <input type="submit" value="Envoyer" class="envoyer">
        </form>
    </div>
</body>
</html>

<style>
    label{
        font-size: 20px;
    }
</style>