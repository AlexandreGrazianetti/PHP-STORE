<?php
require_once __DIR__.'/classes/Database.php';
require_once __DIR__.'/functions/utils.php';
require_once __DIR__.'/classes/UserError.php';

if (!isset($_POST['mail']) || !isset($_POST['password']) || !isset($_POST['name'])){
    redirect('/');
}

$username = trim($_POST['name']);
$usermail = trim($_POST['mail']);
$userpassword = trim($_POST['password']);

if(empty($username)){
    redirect('/Inscription.php?error=' . UserError::NAME_REQUIRED);
}
if(empty($usermail)){
    redirect('/Inscription.php?error=' . UserError::MAIL_REQUIRED);
}
if (empty($userpassword)){
    redirect('/Inscription.php?error=' . UserError::PASSWORD_REQUIRED);
}

try {
    $pdo = Database::getConnection();
} catch(PDOException $ex) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$stmt = $pdo->prepare("INSERT INTO user (name, mail, password) VALUES (:username, :usermail, :userpassword");
$stmt->execute([
    'username'=>$username,
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