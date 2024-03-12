<?php

require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/ProductError.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si un fichier a été téléchargé avec succès
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Récupérer le chemin temporaire du fichier téléchargé
        $tmpFilePath = $_FILES['file']['tmp_name'];

        // Récupérer le nom du fichier
        $fileName = basename($_FILES['file']['name']);

        // Lire le contenu du fichier
        $fileContent = file_get_contents($tmpFilePath);

        // Connexion à la base de données
        try {
            $pdo = Database::getConnection();
        } catch(PDOException $ex) {
            echo "Erreur lors de la connexion à la base de données";
            exit;
        }

        // Récupérer les données du formulaire
        $productName = trim($_POST['name']);
        $productPrice = trim($_POST['price']);
        $productDescription = trim($_POST['description']);
        $productCategory = $_POST['category'];

        // Vérifier les champs obligatoires
        if (empty($productName)) {
            redirect('/add-category.php?error=' . Product_Error::NAME_REQUIRED);
        }
        if (empty($productPrice)) {
            redirect('/add-category.php?error=' . Product_Error::PRICE_REQUIRED);
        }
        if (empty($productDescription)) {
            redirect('/add-category.php?error=' . Product_Error::DESCRIPTION_REQUIRED);
        }
        if (empty($productCategory)) {
            redirect('/add-category.php?error=' . Product_Error::CATEGORY_REQUIRED);
        }

        // Préparer et exécuter la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO product (name, price_vat_free, cover, description, category_id) VALUES (:productName, :productPrice, :productCover, :productDescription, :productCategory)");
        $stmt->execute([
            'productName' => $productName,
            'productPrice' => $productPrice,
            'productCover' => $fileName, // Enregistrer le nom du fichier dans la base de données
            'productDescription' => $productDescription,
            'productCategory' => $productCategory
        ]);

        // Vérifier si l'insertion s'est bien déroulée
        if ($stmt === false) {
            echo "Erreur lors de la requête";
            exit;
        }

        // Déplacer le fichier téléchargé vers son emplacement final
        $uploadDir = __DIR__ . '/uploads/';
        $uploadPath = $uploadDir . $fileName;
        move_uploaded_file($tmpFilePath, $uploadPath);

        // Démarrer la session et définir un message de succès
        session_start();
        $_SESSION['message'] = "Le produit a bien été enregistré";

        // Rediriger vers la page d'accueil
        redirect('/');
    } else {
        // Si aucun fichier n'a été téléchargé, rediriger avec une erreur
        redirect('/add-category.php?error=' . Product_Error::COVER_REQUIRED);
    }
} else {
    // Si la méthode de requête n'est pas POST, rediriger vers la page d'accueil
    redirect('/');
}
