<?php
require_once 'Model.php';
class AdminPannel extends Model {
    public function getOrders() {
        $sql = "SELECT * FROM orders";
        $orders = $this->executerRequete($sql);
        return $orders;
    }
};
