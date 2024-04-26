<?php
include "header.php";
include "connexion_bdd.php";
$id = $_POST['id_val'];
            $requete = 
            "SELECT etudiant.nom_et_prenom as nom_et_prenom,notes.id as id_num, classe.nom as nom_classe, matiere.nom as nom_mat, note1, note2, note3, moy 
            FROM notes, matiere, classe, etudiant
            WHERE
            classe.id LIKE etudiant.id_classe AND notes.id_mat LIKE matiere.id AND notes.id_etudiant LIKE etudiant.id AND etudiant.id LIKE notes.id_etudiant AND notes.id LIKE $id ";
            $resultat = $connexion->query($requete);
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    $note1 = $row["note1"];
                    $note2 = $row["note2"];
                    $note3 = $row["note3"];
                    $moy = $row["moy"];
                    $nom = $row["nom_et_prenom"];
                    $nom_classe = $row["nom_classe"];
                    $nom_mat = $row["nom_mat"];

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
        <form action="modifier_notes_traitement.php" method="post">
            <label for="">Nom : <?php echo $nom ?></label><br>
            <label for="">Classe : <?php echo $nom_classe ?></label><br>
            <label for="">Matière : <?php echo $nom_mat ?></label><br>
            <label for="">Note 1</label>
            <input type="text" placeholder="note1" name="note1" value = "<?php echo $note1 ?>"><br>
            <label for="">Note 2</label>
            <input type="text" placeholder="note2" name="note2" value = "<?php echo $note2 ?>"><br>
            <label for="">Note 3</label>
            <input type="text" placeholder="note3" name="note3" value = "<?php echo $note3 ?>"><br>
            <label for="">Moyenne : <?php echo $moy ?></label>
            <input type="text"  name="id_val" value = "<?php echo $id ?>"hidden><br>
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