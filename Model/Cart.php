<?php
require_once 'Model.php';
class Cart extends Model {

    public function getOrderId($customer_id)
    {
        $sql = "select id from orders where customer_id = ? and status != 10 ";
        $id = $this->executerRequete($sql, array($customer_id));
        if ($id->rowCount() > 0) {
            return $id->fetch();
        }
        else {
            return false; // si on essaie de regarder une commande qui n'existe pas on le fait savoir
        }

    }
    
    public function getCartContent($order_id)
    {
        $sql = "select * from products P where P.id IN
        (SELECT product_id from orderitems where order_id = ?)";
        $product = $this->executerRequete($sql, array($order_id));
        if ($product->rowCount() > 0)
        {
            return $product;
        }
        else
            return;
    }


    public function createOrder($customer_id, $session, $registered) // l'id custommer sera 0 si l'utilisateur n'est pas connecté.
    {
        $sql = "insert into orders(customer_id, date, registered, session, status) 
        VALUES (?, ?, ?, ?, 0)";
        try{
            $this->executerRequete($sql, array($customer_id, date("Y")."-".date("m")."-".date("d"), $session, $registered));
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function addProductToOrder($order_id, $product_id, $quantity){
        $sql = "insert into orderitems (order_id, product_id, quantity)
        values (?, ?, ?)";
        try{
            $this->executerRequete($sql, array($order_id, $product_id, $quantity));
            $this->mergeSameItemsCart($order_id, $product_id);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function existsInOrder($order_id, $product_id)
    {
        $sql = "select * from orderitems where order_id = ? and product_id = ?";
        $product = $this->executerRequete($sql, array($order_id, $product_id ));
        return ($product->rowCount() > 1);
    }

    private function mergeSameItemsCart($order_id, $product_id)
    {
        if ($this->existsInOrder($order_id, $product_id))
        {
            $sql = "UPDATE orderitems
            set quantity = (SELECT SUM(quantity) FROM orders WHERE product_id = ? and order_id = ?)
            where product_id = ? and order_id = ?";
            $sql2 = "DELETE
                    FROM   orderitems
                    WHERE  id IN (
                                   SELECT MAX(id)
                                   FROM   orderitems
                                    WHERE order_id = 67 and product_id = 30
                                   GROUP BY order_id, product_id, quantity
                                   HAVING COUNT(*) > 1
                                  )";
            try{
                $this->executerRequete($sql, array($product_id, $order_id, $product_id, $order_id));
                $this->executerRequete($sql, array($order_id, $product_id));
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }


    }
};
