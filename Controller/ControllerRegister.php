<?php

require_once 'Model/Register.php';
require_once 'View/View.php';

class ControllerRegister {

    private $register;

    public function __construct() {
        $this->register = new Register();
    }

    public function ctrlUserAlreadyExists($username) {
        return ($this->register->userAlreadyExists($username)); //Si l'utilisateur existe déjà on renvoie true
    }

    public function ctrlRegisterUser($username, $hashedPassword, $firstname, $surname, $add1, $add2, $city, $postcode, $phone, $email) {
        $this->register->registerUser($username, $hashedPassword);
    }
    
    public function showRegisterPage($errorMessage = "") {
        $view = new View("Register");
        $view->generer(array('errorMessage' => $errorMessage));
    }

}

