<?php
require_once __DIR__ . '/classes/Categories.php';
require_once __DIR__ . '/add-product-process.php';
require_once __DIR__ . '/layout/header.php';
?>

<main>
    <h1>Nouveau produit</h1>

    <?php if (isset($_GET['error'])) { ?>
    <p style="color: white; background-color: red;">
        <?php echo categoryErrorMessage(intval($_GET['error'])); ?>
    </p>
    <?php } ?>

    <?php
    $categoriesDb = new Categories();
    $categories = $categoriesDb->findAll();
    ?>
    <form action="add-product-process.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" />
        </div>
        <div>
            <label for="price">Prix :</label>
            <input type="text" name="price" id="price" />
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <select name="category" id="category">
                <option value="0">--- Choisissez une catégorie ---</option>
                <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['id']; ?>">
                    <?php echo $category['name']; ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="file">Sélectionner une image pour ajouter votre produit :</label><br>
            <input type="file" name="file" id="file"><br>
        </div>
        <div>
            <input type="submit" value="Enregistrer" />
        </div>
    </form>
</main>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
