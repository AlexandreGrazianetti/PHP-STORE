<?php
require_once __DIR__.'/layout/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<div class="container">
    <div class="card">
        <form action="Connection.php" method="post">
            <label for="username"><b>Nom d'utilisateur</b></label><br>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            <br>
            <label for="password"><b>Mot de passe</b></label><br>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <br><button type="submit">Se connecter</button>
        <p>Vous n'avez pas encore de compte utilisateur, alors inscrivez-vous !</p>
        <button onclick="window.location.href='Inscription.php'">Inscription</button>
        </form>
    </div>
</div>
<?php
require_once __DIR__.'/layout/footer.php';
?>
