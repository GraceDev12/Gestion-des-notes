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
        <h3>Notes</h3>
    </div>
    <div class="un_bouton">
        <a href="ajouter_note.php">Ajouter une note</a>
    </div>




    <?php
            $requete = 
            "SELECT
            classe.id, etudiant.nom_et_prenom as nom_et_prenom,notes.id as id_num, classe.nom as nom_classe, matiere.nom as nom_mat, note1, note2, note3, moy 
            FROM notes, matiere, classe, etudiant
            WHERE
            classe.id LIKE etudiant.id_classe AND notes.id_mat LIKE matiere.id AND notes.id_etudiant LIKE etudiant.id AND etudiant.id LIKE notes.id_etudiant
            ORDER BY classe.id";
            $resultat = $connexion->query($requete);
            $compter = 0;
            $comparer = "";
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    $compter = $compter + 1;
                    if ($comparer == $row["nom_classe"]) {
                    }else {
                        
                        echo '<table class="la_table">
                            <tr>
                                <th>Numero</th>
                                <th>Nom étudiant</th>
                                <th>Classe</th>
                                <th>Matiere</th>
                                <th>Note 1</th>
                                <th>Note 2</th>
                                <th>Note 3</th>
                                <th>Moyenne</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        ';
                        echo'<h3> Classe : ' .$row["nom_classe"]. ' </h3>';
                        $comparer = $row["nom_classe"];
                    }
                    echo "<tr><td>" . $compter . "</td>";
                    echo "<td>" . $row["nom_et_prenom"] . "</td>";
                    echo "<td>" . $row["nom_classe"] . "</td>";
                    echo "<td>" . $row["nom_mat"] . "</td>";
                    echo "<td>" . $row["note1"] . "</td>";
                    echo "<td>" . $row["note2"] . "</td>";
                    echo "<td>" . $row["note3"] . "</td>";
                    echo "<td>" . $row["moy"] . "</td>";
                    $id_val = $row["id_num"];
                    echo'
                    <td><form action="modifier_note.php" method="post" enctype="multipart/form-data">
                    <input type="text" value="'.$id_val.'" name="id_val"  hidden>
                    <input type="submit" value="Modifier" class="modifier">
                    </form></td>
                    ';
                    echo'
                    <td><form action="supprimer_note.php" method="post" enctype="multipart/form-data">
                    <input type="text" value="'.$id_val.'" name="id_val"  hidden>
                    <input type="submit" value="Supprimer" class="supprimer">
                    </form></td></tr>
                    ';

                }
            }
            // Fermer la connexion à la base de données
            $connexion->close();

            ?>
  
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
    h3{
        margin-left : 30px;
    }

    .supprimer{
        border : none;
        background : none;
        color : red;
        font-weight: bolder;
        margin-top : 0px;
    }

</style>
