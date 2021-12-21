<?php

require_once 'Model/Catalog.php';
require_once 'View/View.php';

class ControllerCatalog {

    private $catalogue;

    public function __construct() {
        $this->catalogue = new Catalog();
    }

// Affiche la liste de tous les trucs à acheter
    public function accueil() {
        $products = $this->catalogue->getProducts();
        $vue = new View("Catalog");
        $vue->generer(array('products' => $products));
    }

}

