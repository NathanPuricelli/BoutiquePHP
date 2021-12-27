<?php

require_once 'Controller/ControllerCatalog.php';
require_once 'Controller/ControllerProduct.php';
require_once 'Controller/ControllerCart.php';
require_once 'Controller/ControllerLogin.php';

require_once 'View/View.php';
class Routeur {

    private $ctrlCatalog;
    private $ctrlProduct;
    private $ctrlCart;
    private $ctrlLogin;

    public function __construct() {
        $this->ctrlCatalog = new ControllerCatalog();
        $this->ctrlProduct = new ControllerProduct();
        $this->ctrlCart = new ControllerCart();
        $this->ctrlLogin = new ControllerLogin();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['page'])) {
                if ($_GET['page'] == 'catalog') {
                    if (isset($_GET['cat'])) {
                        $this->ctrlCatalog->accueil(intval($_GET['cat']));
                    }
                    else {
                        $this->ctrlCatalog->accueil(0);
                    }
                }
                else if(($_GET['page'] == 'product') && (isset($_GET['id']))) {
                    $id = intval($_GET['id']);
                    $errormessage="<p style='color:red;'>"; // le message d'erreur va contenir tous les problèmmes du formulaire 
                    $continue = true; // Booléen attestant la validité du formulaire
                    if (isset($_POST["confirm-review"])) //Si le formulaire a ete rempli au moins une fois
                    {
                        if (strlen($_POST["review_form_title"]) < 1) {$errormessage .= "<br> Le titre doit faire au moins une lettre"; $continue=false;}
                        if (strlen($_POST["review_form_description"]) < 1) {$errormessage .= "<br> La description doit faire au moins une lettre"; $continue=false;} // Si la description est vide on affiche l'erreur et on déclare comme invalide le formulaire
                        if (strlen($_POST["review_form_name_user"]) < 1) {$errormessage .= "<br> Veuillez renseigner votre nom"; $continue=false;}

                        if($continue) // si le formulaire est valide
                        {
                            $this->ctrlProduct->ctrlAddReview(intval($_GET['id']), $_POST["review_form_name_user"], $_POST["review_form_photo_user"], $_POST["review_form_stars"],
                                                                    $_POST["review_form_title"], $_POST["review_form_description"]);
                            header("Location: index.php?page=product&id=".$_GET['id']."#addReviewSection");//on redirige vers la page du produit
                        }
                    }
                    $errormessage .= "</p>"; //Fin de la chaine d'erreurs
                    $this->ctrlProduct->showProduct($id, $errormessage);

                } 
                else if($_GET['page'] == 'login') {
                    if (isset($_POST["login-request"])) {
                        $username = $_POST["login_form_username"];
                        $hashedPassword = sha1($_POST["login_form_password"]);
                        
                        $query = $this->ctrlLogin->ctrlGetUser($username, $hashedPassword);

                        $this->ctrlLogin->showLoginPage();
                    } else {
                        $this->ctrlLogin->showLoginPage();
                    }
                }

                else{
                    throw new Exception("Action non valide");
                }
            }            
            else {
                $this->ctrlCatalog->accueil(0);
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