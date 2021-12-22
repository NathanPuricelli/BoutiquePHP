<?php

require_once 'Controller/ControllerCatalog.php';
require_once 'Controller/ControllerProduct.php';
require_once 'Controller/ControllerCart.php';
require_once 'View/View.php';
class Routeur {

    private $ctrlCatalog;
    private $ctrlProduct;
    private $ctrlCart;

    public function __construct() {
        $this->ctrlCatalog = new ControllerCatalog();
        $this->ctrlProduct = new ControllerProduct();
        $this->ctrlCart = new ControllerCart();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['page'])) {
                if ($_GET['page'] == 'catalog') {
                   $this->ctrlCatalog->accueil();
                }
                else if(($_GET['page'] == 'product') && (isset($_GET['id']))) {
                    $id = intval($_GET['id']);
                    $this->ctrlProduct->showProduct($id);

                }
                /*else if () {

                }*/
                else
                    throw new Exception("Action non valide");
            }
            else {
                $this->ctrlCatalog->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new View("Error");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}