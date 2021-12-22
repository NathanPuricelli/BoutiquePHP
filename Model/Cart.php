<?php
require_once 'Model.php';
class Cart extends Model{
    public function getCartContent()
    {
        /*
        $sql = "SELECT * FROM products WHERE id = ?";
        $product = $this->executerRequete($sql, array($id));
        if ($product->rowCount() > 0)
        {
            return $product->fetch();
        }
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$id'");
        */
    }
};
