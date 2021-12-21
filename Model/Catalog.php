<?php
require_once 'Model.php';
class Catalog extends Model{
    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $categories = $this->executerRequete($sql);
        return $categories;
    } 
};