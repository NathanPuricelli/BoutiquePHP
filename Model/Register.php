<?php
require_once 'Model.php';
class Register extends Model {
    public function userAlreadyExists($username) {
        $sql = "SELECT * FROM logins WHERE username = ?";
        $query = $this->executerRequete($sql, array($username));
        if ($query->rowCount() > 0) {
            return true; //Cet utilisateur existe déjà
        }
        else
            return false; //Cet utilisateur n'existe pas
    }

    public function registerUser($username, $hashedPassword) {
        $sql = "INSERT INTO logins (id, customer_id, username, password)
                    VALUES (NULL, '1', ?, ?);";
        try{
            $this->executerRequete($sql, array($username, $hashedPassword));
        }
        catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
};
