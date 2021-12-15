<?php

require_once 'Controller/ControllerCatalogue.php';
require_once 'Controller/ControllerPanier.php';
require_once 'View/Vue.php';
class Routeur {

    private $ctrlCatalogue;

    public function __construct() {
        $this->ctrlCatalogue = new ControleurCatalogue();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'product') {
                   $this->ctrlCatalogue->accueil();
                }
                else
                    throw new Exception("Action non valide");
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