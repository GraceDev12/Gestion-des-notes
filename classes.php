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
        <h3>Classes</h3>
    </div>
    <div class="un_bouton">
        <a href="ajouter_classe.php">Ajouter une classe</a>
    </div>
    <table class="la_table">
            <tr>
                <th>Numero</th>
                <th>Nom classe</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            
            <?php
            $requete = 
            "SELECT `id`, `nom` FROM `classe` ";
            $resultat = $connexion->query($requete);
            $compter = 0;
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    $compter = $compter + 1;
                    echo "<tr><td>" . $compter . "</td>";
                    echo "<td>" . $row["nom"] . "</td>";
                    $id_val = $row["id"];
                    echo'
                    <td><form action="modifier_classe.php" method="post" enctype="multipart/form-data">
                    <input type="text" value="'.$id_val.'" name="id_val"  hidden>
                    <input type="submit" value="Modifier" class="modifier">
                    </form></td>
                    ';
                    echo'
                    <td><form action="supprimer_classe.php" method="post">
                    <input type="text" value="'.$id_val.'" name="id_val" id="id_val"  hidden>
                    <input type="submit" value="Supprimer" class="supprimer">
                    </form></td></tr>
                    ';
                }
            }
            // Fermer la connexion à la base de données
            $connexion->close();

            ?>
    </table>
</body>
</html>

<style>
    th {
        border : 1px solid black;
    }
    .modifier{
        border : none;
        background : none;
        color : green;
        border-radius : 0px;
        font-weight: bolder;
        margin-top : 0px;
    }

    .supprimer{
        border : none;
        background : none;
        color : red;
        font-weight: bolder;
        margin-top : 0px;
    }

</style>
