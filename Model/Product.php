<?php
require_once 'Model.php';
class Product extends Model{
    public function getProduct($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $product = $this->executerRequete($sql, array($id));
        if ($product->rowCount() > 0)
        {
            return $product->fetch();
        }
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$id'");
    } 

    public function getReviews($id)
    {
        $sql = "SELECT * FROM reviews WHERE id_product = ?";
        $product = $this->executerRequete($sql, array($id));
        if ($product->rowCount() > 0)
        {
            return $product;
        }
        else
            return;

    }
};
