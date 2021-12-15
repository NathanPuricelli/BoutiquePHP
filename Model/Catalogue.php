<?php
require_once 'Modele.php';
class Catalogue extends Modele{
    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $categories = $this->executerRequete($sql);
        return $categories;
    } 
};