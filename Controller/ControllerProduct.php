<?php

require_once 'Model/Product.php';
require_once 'View/Vue.php';

class ControleurProduct {

    private $product;

    public function __construct() {
        $this->product = new Product();
    }

// Affiche la liste de tous les trucs à acheter
    public function showProduct($id) {
        $product = $this->product->getProduct($id);
        $reviews = $this->product->getReviews($id);
        $vue = new Vue("Product");
        $vue->generer(array('product' => $product, 'reviews' => $reviews));
    }

}

