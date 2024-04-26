<?php

include "connexion_bdd.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $pass = $_POST["pass"];
    if ($nom =="") {
        echo '<script>alert("Le nom d uilisateur est vide");</script>';
        echo '<script>window.location.href = "index.php";</script>';
    }elseif ($pass == "") {
        echo '<script>alert("Le mot de passe est vide");</script>';
        echo '<script>window.location.href = "index.php";</script>';
    }else
    {
        $sql = "SELECT * FROM users WHERE nom_use='$nom' AND pass='$pass'";
$result = $connexion->query($sql);

// Vérifier si des résultats sont retournés
if ($result->num_rows > 0) {
    echo '<script>alert("Bienvenu");</script>';
        echo '<script>window.location.href = "classes.php";</script>';  

} else {
    echo '<script>alert("Utilisateur non trouvé");</script>';
        echo '<script>window.location.href = "index.php";</script>'; 
}


        
    }
    
}
?>


