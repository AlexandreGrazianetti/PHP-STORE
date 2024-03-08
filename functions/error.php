<?php
require_once __DIR__ .'/../classes/categories_error.php';
require_once __DIR__ .'/../classes/product_error.php';
function CategoryErrorMessage(int $errorCode) : string
{
    //match compare les valeurs d'une manière stricte et
    //non de manière faible comme le fait l'instruction switch.
    return match ($errorCode) {
        Categories_error::NAME_REQUIRED=> "Le nom de la catégorie est obligatoire",
        default => "Une erreur est survenue"
    };
/*     switch($errorCode){
        case 1 :   $errorMsg = 'Le nom est obligatoire.<br/>';
        default: $errorMsg = 'Une erreur est survenue';
        break;
    }
    return $errorMsg; */
}
function ProductErrorMessage(int $errorCode) : string
{//match compare les valeurs d'une manière stricte et
    //non de manière faible comme le fait l'instruction switch.
    return match ($errorCode) {
        Product_error::NAME_REQUIRED=> "Le nom du produit est obligatoire",
        default => "Une erreur est survenue"
    };
}