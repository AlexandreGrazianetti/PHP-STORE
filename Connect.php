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
    <form action=".php" method="post">
        <label for="username"><b>Nom d'utilisateur</b></label><br>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
        <br>
        <label for="password"><b>Mot de passe</b></label><br>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
    <br><button type="submit">Se connecter</button>
    <?php
        // Assume $passwordFromUser is the password entered by the user
        // and $passwordFromDB is the hashed password from the database
        if (password_verify($passwordFromUser, $passwordFromDB)) {
            // If the passwords match, the user can log in
            echo "Login successful!";
        } else {
            // If the passwords don't match, the user cannot log in
            echo "Invalid password!";
        }
    ?>
    </form>
</div>

</body>
</html>
