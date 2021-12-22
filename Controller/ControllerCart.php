<?php

require_once 'Model/Cart.php';
require_once 'View/View.php';

class ControllerCart {

    private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    // Affiche la liste des arcticles dans le panier, et les informations pour regler
    public function showCartContent() {
        $products = $this->cart->getCartContent();
        $view = new View("Cart");
        $view->generer(array('products' => $products));
    }

}

