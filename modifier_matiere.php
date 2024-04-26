<?php
include "header.php";
include "connexion_bdd.php";
$id = $_POST['id_val'];
            $requete = 
            "SELECT `id`, `nom` FROM `matiere` WHERE id LIKE $id";
            $resultat = $connexion->query($requete);
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    $nom = $row["nom"];
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
        <h3>Matières</h3>
    </div>

    <div class="formulaire">
        <form action="modifier_matiere_traitement.php" method="post">
            <label for="">Nom</label>
            <input type="text" placeholder="Nom de la matiere" name="nom_mat" value = "<?php echo $nom ?>"><br>
            <input type="text"  name="id_val" value = "<?php echo $id ?>" hidden><br>
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