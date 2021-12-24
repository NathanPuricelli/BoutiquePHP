<?php

require_once 'Model/Catalog.php';
require_once 'View/View.php';

class ControllerCatalog {

    private $catalog;

    public function __construct() {
        $this->catalog = new Catalog();
    }

// Affiche la liste de tous les trucs à acheter
    public function accueil($cat_id) {
        $categories = $this->catalog->getCategories();
        $categ = $this->catalog->getCategoryName($cat_id);
        $products = $this->catalog->getProducts($cat_id);
        $view = new View("Catalog");
        $view->generer(array('products' => $products, 'categories' => $categories, 'category_name' => $categ));
    }

}

