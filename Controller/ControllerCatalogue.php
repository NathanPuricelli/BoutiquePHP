<?php

require_once 'Model/Catalogue.php';
require_once 'View/Vue.php';

class ControleurCatalogue {

    private $catalogue;

    public function __construct() {
        $this->catalogue = new Catalogue();
    }

// Affiche la liste de tous les trucs à acheter
    public function accueil() {
        $products = $this->catalogue->getProducts();
        $vue = new Vue("Catalogue");
        $vue->generer(array('products' => $products));
    }

}

