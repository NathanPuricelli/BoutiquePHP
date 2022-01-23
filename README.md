# Boutique

Cite d'e-commerce réalisé dans le cadre de l'UE Web par Nathan Puricelli et Aymeric Leto.

Arborescence du projet :
    Assets :
        Ce dossier contient les éléments statiques comme le code JS, les images ou les feuilles de style.
        Il contient aussi la librairie externe de PDF fpdf et son implémentation dans notre projet.
    
    Modele (acces a la base de donnée) 
        Fonctions d'accès et d'écriture dans la base de données qui sont appelées par les controlleurs

    Vues : 
        -template.php : base de toutes les pages php du projet, il contient le code php statique qui ne bouge pas genre tels que les headers et footers du site.
        -View.php : fichier de définition de la classe vue servant à afficher les différentes pages de notre site
        -Les autres fichiers php sont les vues des différentes pages du site.

    Controlleur :
        Les controlleurs font le lien entre la couche Modele et la couche vue en appelant les vues avec les bons éléments récupérés par les requêtes de la couche modèle.

    DB : 
        Ce dossier contient le fichier de création de la base de données, à importer sur MySQL pour pouvoir faire fonctionner le site en local

Répartitions des roles dans l'équipe : 
    Nous avons travaillé ensemble sur la plupart des points du projet, c'est pourquoi il est difficile d'attribuer la réalisation des taches à une seule personne.
    Nous avons par exemple travaillé ensemble sur les différentes parties du back comme le catalogue ou les produits, l'ajout de commentaires...
    Les taches réalisées plus individuellement sont les suivantes :
        -Aymeric Leto : 
            Front end du site (css, bootstrap)
            Pannel administrateur (finaliser les commandes, recuperer les infos des commandes et ajouter un nouvel admin)
            fpdf pour gérer les factures
        -Nathan Puricelli :
            Mise en place architecture MVC
            Principales requetes SQL
            Gestion du panier et des commandes lors de la navigation dans le site
    Pour des informations plus précises sur la réalisation des taches, nous vous invitons à regarder notre projet sur la forge Lyon 1. 
    Nous pourrons vous ajouter sur le projet pour que vous puissiez voir l'historique des modifications si vous le souhaitez. 

Difficultés et solutions : 
    Un grand nombres des parties du projet n'étaient pas très difficile mais ont pris beaucoup de temps à réaliser. C'est par exemple le cas du front end du site ou encore de la gestion du panier.
    Deux points ont été plus difficiles à gérer que les autres : 
        -Nous n'étions pas familiers avec la gestion des variables de session et de l'architecture MVC. Nous ne savions donc pas où mettre le session_start(). 
            La solution était de le mettre dans index.php et non pas dans le routeur.
        -Lors du paiement d'une commande, il fallait mettre à jour la table des commandes (orders) avec l'id de l'adresse de livraison alors renseignée.
        Le problème était que nous devions faire ces deux opérations en même temps et qu'aucune colonne de notre base de donnée ne regroupait ces deux tables.
            La solution était de créer dans un premier temps l'adresse de liveraison (ligne de delivery_adresses), puis d'utiliser une fonction de PDO nommée getLastInsertId(), qui récupérait l'id de la dernière ligne insérée par PDO.
    

Comment faire fonctionner le site :
    -Importer la base de données web4shop2021.sql dans un serveur local gérant MySQL tel que XAMPP.
    -Créer un utilisateur MySQL avec pour nom 'userepul' et comme MDP 'epul' et lui accorder les droits sur la base web4shop.
    -Ou alors, changer dans le fichier de configuration Model/Model.php la fonction 'getBDD()' en modifiant les variables $dbuser et $dbpwd
    -Vous pourrez ensuite acceder au site en allant sur la page index.php du site.

Comment acceder au pannel admin (validation des commandes, visualisation des factures...) :
    -Connectez-vous comme un utilisateur classique avec le nom d'utilisatuer 'admin' et le MDP 'admin'
    -Vous pourrez ensuite gérer les différents admins et les différentes commandes.

Liste des fonctionnalités du site : 
    Sur la page d'accueil, un utilsateur peut :
        -Regarder l'ensemble des produits
        -Regarder les produits en fonciton des catégories
        -Utiliser la barre de recherche pour rechercher un produit
        -Ajouter un produit de la page d'accueil directement à son panier
        -Cliquer sur un produit pour afficher sa fiche produit
        -Se connecter
        -Accéder à son panier
        -Un utilisateur connecté peut se déconnecter et acceder à son profil (historique et état des commandes)
        -Un utilisateur non connecté peut se connecter ou bien s'inscrire
        -Un admin peut se conbnecter à son compte admin depuis la page de connexion
    
    Sur la page produit, un utilisateur pourra : 
        -Regarder les informations du produit
        -Ajouter une quantité de ce produit dans son panier dans la limite des stocks
        -Regarder les avis des clients sur ce produit
        -Ajouter un avis sur ce produit
    
    Sur la page d'inscription, un utilisateur non connecté pourra s'inscrire.

    Sur la page de connexion, un utilisateur ou un admin déja inscrits pourront se connecter
    
    Sur la page panier, un utilisateur peut :
        -Voir un message lui indiquant que son pannier est vide si l'utilisateur n'y a rien ajouté
        -Voir les produits et leur quantité présents dans le panier
        -Ajouter et supprimer une pièce de chaque élement avec un bouton
        -Supprimer un produit du panier
        -Avoir l'info sur le prix total du panier
        -Passer au paiement (passage du statut de la commande à 1 au lieu de 0 et redirection sur la page de paiement)

    Sur la page de paiement, un utilisateur peut : 
        -Procéder au paiement de sa commande en remplissant son adresse de livraison, son mode de paiement et en confirmant
        -Modifier sa commande et ainsi retourner au panier (passahe du statut de la commande à 0 au lieu de 1)
 
    Sur la page profil, un utilisateur peut : (seul un utilisateur connecté peut acceder directement à cette page, les utilisateurs non connectés y auront accès seulement après le paiement d'une commande pour télecharger sa facture)
        -Consulter ses commandes et leur status
        -Télecharger la facture relative à la commande en format pdf (géré avec fpdf)

    Sur la page admin panel (uniquement disponible pour un admin), un admin peut :
        -Avoir accès aux informations de toutes les commandes des clients
        -Valider l'expédition d'une commande payée (passage du statut de la commande à 10 au lieu de 2)
        -Télecharger les factures des commandes payées
        -Ajouter un nouvel admin en rentrant son identifiant et son mot de passe


Lien du projet sur la forge lyon 1 : https://forge.univ-lyon1.fr/p1907453/boutique