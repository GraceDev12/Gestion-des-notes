<?php
include "header.php";
include "connexion_bdd.php";
$id = $_POST['id_val'];
            $requete = 
            "SELECT `id`, `nom` FROM `classe` WHERE id LIKE $id";
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
    <script src="script3.js" defer></script>
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
        <p>Moification réussie
        </p>
        <button class="close-btn">OK</button>
    </div>
  </div>
    <div  class="sous_titre">
        <h3>Classes</h3>
    </div>

    <div class="formulaire">
        <form id="myForm">
            <label for="">Nom</label>
            <input type="text" placeholder="Nom de la classe" name="nom_classe" id="nom_classe" value = "<?php echo $nom ?>"><br>
            <input type="text"  name="id_val" id="id_val" value = "<?php echo $id ?>"hidden><br>
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