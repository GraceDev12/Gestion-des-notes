
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
        <h3>Connexion</h3>
    </div>
    <div class="formulaire">
        <form action="connexion_traitement.php" method="post">
            <input type="text" placeholder="Nom d utilisateur" name="nom"><br>
            <input type="password" placeholder="Mot de passe" name="pass"><br>
            <input type="submit" value="Envoyer" class="envoyer">
            <br><br>
        <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a></p><br>
        </form>
    </div>
</body>
</html>