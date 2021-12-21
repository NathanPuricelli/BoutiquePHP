<?php

require_once 'Controller/ControllerCatalogue.php';
require_once 'Controller/ControllerProduct.php';
require_once 'View/Vue.php';
class Routeur {

    private $ctrlCatalogue;
    private $ctrlProduct;

    public function __construct() {
        $this->ctrlCatalogue = new ControleurCatalogue();
        $this->ctrlProduct = new ControleurProduct();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['page'])) {
                if ($_GET['page'] == 'catalog') {
                   $this->ctrlCatalogue->accueil();
                }
                else if(($_GET['page'] == 'product') && (isset($_GET['id'])))
                {
                    $id = $_GET['id'];
                    $this->ctrlProduct->showProduct($id);

                }
                else
                    throw new Exception("Action non valide");
            }
            else {
                $this->ctrlCatalogue->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}