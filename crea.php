<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="crea.css">
    <title>Création de Compte</title>
</head>
<body>
<div class="container">
        <img src="logoJeunes.png" alt="Image" class="logo">
<form method="post" action="">
    <h4><i> INSCRIPTION</i></h4>
     <input type="text" name="nom" placeholder="Nom"><br>
     <input type="text" name="prenom" placeholder="Prénom"><br>
     <input type="email" name="email" placeholder="Email"><br>
     <input type="password" name="password" placeholder="Mot de passe"><br>
    <input type="submit" name="submit" value="Créer un compte"><br>
    <a href="connex.php" class="btn" id="signin">Connexion</a>
</form>
</div>



<?php
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $file = fopen('comptes.csv', 'a+'); // Ouverture du fichier en mode lecture/écriture

    // Vérification si l'email existe déjà
    while (($data = fgetcsv($file)) !== FALSE) {
        if ($data[0] == $email) {
            echo "<p style='color: white; margin-top:40%; margin-left:-19%;'>L'adresse e-mail existe déjà.</p>";
            fclose($file);
            return;
        }
    }

    // Si l'email n'existe pas, ajoute le nouveau compte
    fputcsv($file, array( $email, $nom, $prenom, $password));

    fclose($file);

    echo "<p style='color: white; margin-top:40%; margin-left:-19%;'>Compte créé avec succès!</p>";
}
?>

</body>
</html>
