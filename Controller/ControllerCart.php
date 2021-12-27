<?php

require_once 'Model/Cart.php';
require_once 'View/View.php';

class ControllerCart {

    private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    public function addItemToOder() {
        //Ajoute une ligne à la table orderitem en indiquant quel produit et en quelle quantité il a été ajouté
        
    }
    
    public function showCartContent() {
        // Affiche la liste des articles dans le panier, et les informations pour regler
        $products = $this->cart->getCartContent();
        $view = new View("Cart");
        $view->generer(array('products' => $products));
    }

}

