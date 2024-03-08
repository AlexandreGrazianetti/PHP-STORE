<?php
//Pour cette fonctionnalité, la mettre sur la page de création de produit ?
//page permettant d'ajouter des images via upload
//des commentraires seront ajoutés pour expliquer à quoi sert telles blocs de codes.
//Source : https://www.php.net/manual/fr/features.file-upload.post-method.php
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <form action="Upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Sélectionner une image pour ajouter votre produit :</label><br>
        <input type="file" name="file"><br>
        <button type="submit">Enregistrer</button><br>
    </form>
</body>
</html>