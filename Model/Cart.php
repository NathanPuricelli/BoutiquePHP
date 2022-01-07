<?php
require_once 'Model.php';
class Cart extends Model {

    public function getOrderId($id_customer)
    {
        $sql = "select id from orders where customer_id = ? and status != 10 ";
        $id = $product = $this->executerRequete($sql, array($id_customer));
        if ($id->rowCount() > 0) {
            return $id;
        }
        else {
            return false; // si on essaie de regarder une commande qui n'existe pas on le fait savoir
        }

    }
    
    public function getCartContent($id_order)
    {
        $sql = "select * from products P where P.id IN
        (SELECT product_id from orderitems where order_id = ?)";
        $product = $this->executerRequete($sql, array($id_order));
        if ($product->rowCount() > 0)
        {
            return $product;
        }
        else
            return;
    }


    public function createOrder($id_customer, $session, $registered) // l'id custommer sera 0 si l'utilisateur n'est pas connecté.
    {
        $sql = "insert into orders(customer_id, date, registered, session, status) 
        VALUES (?, ?, ?, ?, 0)";
        try{
            $this->executerRequete($sql, array($id_customer, date("Y")."-".date("m")."-".date("d"), $session, $registered));
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function addProductToOrder($id_Order, $id_product, $quantity){
        $sql = "insert into orderitems (order_id, product_id, quantity)
        values (?, ?, ?)";
        try{
            $this->executerRequete($sql, array($id_Order, $id_product, $quantity));
            $this->mergeSameItemsCart($id_Order, $id_product);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function mergeSameItemsCart($id_Order, $id_product)
    {
        $sql = "";
        try{
            $this->executerRequete($sql, array($id_Order, $id_product));
        }
        catch (Exception $e) {
            return $e->getMessage();
        }


    }
};
