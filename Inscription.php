<?php
require_once __DIR__.'/layout/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 300px;
            margin: auto;
            margin-top: 50px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="container">
    <!--Essaie de connecter à la bdd en créant une table nommée user-->
    <form action="add-user-process.php" method="post">
        <label for="username"><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Entrer l'adresse email" name="email" required>

        <label for="password"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>

        <button type="submit">S'inscrire</button><br>
        <button onclick="window.location.href='Connect.php'">Se connecter</button>
    </form>
</div>
<?php
require_once __DIR__.'/layout/footer.php';
?>