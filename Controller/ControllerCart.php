<?php

require_once 'Model/Cart.php';
require_once 'View/View.php';

class ControllerCart {

    private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    public function ctrlGetOrderIdFromUsername($username)
    {
        return $this->cart->getOrderId($username);
    }

    public function ctrlCreateOrder($customer_id, $session, $registered)
    {
        return $this->cart->createOrder($customer_id, $session, $registered);
    }

    public function ctrlAddItemToOder($order_id, $product_id, $quantity) {
        //Ajoute une ligne à la table orderitem en indiquant quel produit et en quelle quantité il a été ajouté
        $this->cart->addProductToOrder($order_id, $product_id, $quantity);
    }
    
    public function showCart($order_id) {
        // Affiche la liste des articles dans le panier, et les informations pour regler
        $products = $this->cart->getCartContent($order_id);
        $view = new View("Cart");
        $view->generate(array('products' => $products));
    }

}

