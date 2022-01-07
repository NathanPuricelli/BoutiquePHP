<?php

require_once 'Model/AdminPannel.php';
require_once 'View/View.php';

class ControllerAdminPannel {

    private $adminPannel;

    public function __construct() {
        $this->adminPannel = new AdminPannel();
    }

    // Afficher la liste des commandes en cours
    /*public function ctrlAddReview($id_product, $name, $photoUser, $stars, $title, $description)
    {
        $this->product->addReview($id_product, $name, $photoUser, $stars, $title, $description);
    }*/

    public function showPannel() {
        $orders = $this->adminPannel->getOrders();
        $view = new View("AdminPannel");
        $view->generate(array('orders' => $orders));
    }
}