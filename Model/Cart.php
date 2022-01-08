<?php
require_once 'Model.php';
class Cart extends Model {

    public function getOrderId($username = null, $session = null)
    {
        if ($username != null)
        {
            $sql = "select O.id
                    from orders O join logins l ON o.customer_id = l.customer_id 
                    where l.username = ?
                    and O.status != 10 ";
            $id = $this->executerRequete($sql, array($username));
            if ($id->rowCount() > 0) {
                return $id->fetch();
            }
            else {
                return null; // si on essaie de regarder une commande qui n'existe pas on le fait savoir
            }
        }
        else 
        {
            $sql = "select id from orders WHERE session = ? and registered = 0 and status != 10";
            $id = $this->executerRequete($sql, array($session));
            if ($id->rowCount() > 0) {
                return $id->fetch();
            }
            else {
                return null;
            }
        }

    }

    public function getOrderStatus($order_id)
    {
        $sql = "select status from orders WHERE id = ? and status != 10";
        $status = $this->executerRequete($sql, array($order_id));
        if ($status->rowCount() > 0) {
            return $status->fetch();
        }
        else 
        {
            throw new Exception("Aucun status n'est associé à la commande '$order_id'");
        }
    }

    public function getCustomerId($username)
    {
        $sql = "select customer_id from logins WHERE username = ?";
        $id = $this->executerRequete($sql, array($username));
        if ($id->rowCount() > 0) {
            return $id->fetch();
        }
        else {
            return null;
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
        $sql = "insert into orders
        VALUES (NULL,?, ?, NULL, NULL, ?, 0, ?, NULL)";
        try{
            $this->executerRequete($sql, array($customer_id, $registered, date("Y")."-".date("m")."-".date("d"), $session ));
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
                $this->executerRequete($sql2, array($order_id, $product_id));
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }


    }
};
