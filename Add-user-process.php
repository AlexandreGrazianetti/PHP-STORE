<?php
//TODO : créer la table des utilisateurs et procéder aux tests si ça ne fonctionne pas prend des notes..
require_once __DIR__.'/classes/Database.php';
require_once __DIR__.'/functions/utils.php';
require_once __DIR__.'/classes/UserError.php';

if (!isset($_POST['mail']) || !isset($_POST['password'])){
    redirect('/');
}

$usermail = trim($_POST['mail']);
$userpassword = trim($_POST['password']);

if(empty($usermail)){
    redirect('/add-category.php?error=' . UserError::MAIL_REQUIRED);
}
if (empty($userpassword)){
    redirect('/add-category.php?error=' . UserError::PASSWORD_REQUIRED);
}

try {
    $pdo = Database::getConnection();
} catch(PDOException $ex) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$stmt = $pdo->prepare("INSERT INTO user (name, mail, password) VALUES (:usermail, :userpassword");
$stmt->execute([
    'usermail'=> $usermail,
    'userpassword'=> $userpassword
]);
if ($stmt === false) {
    echo "Erreur lors de la requête";
    exit;
}

session_start();
$_SESSION['message'] = "Votre compte a bien été enregistré";

redirect('/');