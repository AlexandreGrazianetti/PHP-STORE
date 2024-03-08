<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';
?>
<?php
$productsDb = new Products();
$products = $productsDb->ShowProduct();
?>
<h1>Produits :</h1>
<div class="list-container">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Prix
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Catégorie
                </th>
            </tr>
        </thead>
        <tbody>            
            <?php foreach ($products as $product) { ?>
                <tr>
                    <th><?php echo $product['name']; ?></th>
                    <td><?php echo $product['price_vat_free']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><img src="<?php echo $product['cover']; ?>"/></td>
                    <td><?php echo $product['nom_categorie']; ?></td>
                </tr>
            <?php } ?>            
        </tbody>
    <div>
        <button onclick="window.location.href='add-product.php'">Nouveau Produit</button>
    </div>
</div>

<?php require_once __DIR__ . '/layout/footer.php'; ?>