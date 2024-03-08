<?php

function verifierMotDePasse($saisieUtilisateur, $nomUtilisateur) {
    // Connexion à la base de données
    $servername = "votre_serveur";
    $username = "votre_utilisateur";
    $password = "votre_mot_de_passe";
    $dbname = "votre_base_de_donnees";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Éviter les attaques par injection SQL en utilisant des requêtes préparées
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $nomUtilisateur);

    // Exécuter la requête
    $stmt->execute();

    // Lié le résultat de la requête à une variable
    $stmt->bind_result($motDePasseBDD);

    // Récupérer le résultat
    $stmt->fetch();

    // Fermer la requête
    $stmt->close();

    // Fermer la connexion à la base de données
    $conn->close();

    // Vérifier si le mot de passe correspond
    if (password_verify($saisieUtilisateur, $motDePasseBDD)) {
        return true; // Le mot de passe correspond
    } else {
        return false; // Le mot de passe ne correspond pas
    }
}

// Exemple d'utilisation
$nomUtilisateur = "utilisateur_test";
$saisieUtilisateur = "mot_de_passe_saisi_par_utilisateur";

if (verifierMotDePasse($saisieUtilisateur, $nomUtilisateur)) {
    echo "Mot de passe correct!";
} else {
    echo "Mot de passe incorrect!";
}

