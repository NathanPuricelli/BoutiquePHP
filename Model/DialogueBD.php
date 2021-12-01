<?php

require_once 'Connexion.php' ;
class DialogueBD
{
    public function getToutesLesCat() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM categorie ORDER BY id ASC ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabCat = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabCat;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getAllProducts() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM products";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabProducts = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabProducts;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getCountCategorie($code_cat) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT count(*) as 'count', c.libelleCat FROM plat p, categorie c WHERE p.codeCat = c.codeCat and p.codeCat = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($code_cat));
            $tabPlats = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabPlats;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getUtilisateur($login, $mdp){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM `utilis` WHERE PassUtil = ? and loginUtil = ?";
            $sth = $conn->prepare($sql);
            $sth->execute([$mdp, $login]);
            $tabUtil = $sth->fetchAll(PDO::FETCH_BOTH);
            return $tabUtil;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}
