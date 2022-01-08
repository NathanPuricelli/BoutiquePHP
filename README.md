# Boutique

New Shopify for Raisins Secs and Frozen Bananas dropshipping.
Ce projet a été fait par Nathan et Aymeric les meilleurs de l'info.

Modele (acces a la base de donnée) 
    -Fonctions d'accès et d'écriture dans la base de données

Vues : 
    -Gabarit : base de toutes les pages php, on met le code statique qui bouge pas genre les div, headers et footers
    -Vues : gère les variables qui changent par rapport au gabarit
Controller :
    -Fait le lien entre la bdd et la vue.



    To do : 
        -Panier :
            Affichage des articles du panier (on créé une commande)
            Suppression d'un article du panier avec actualisation
            Bouton Caisse : 
                -pour les connectés : on valide son adresse (peut etre en remettre une ?)
                - pour les non connectés : On rentre une adresse dans le formulaire (dans delivery adress)
                Paypal
                Chéque (+ facture pdf)
            Pour les non connectés avec les variables de session
            Pour les connectés.
        -Page admin pour check tout (vérifier que l'admin est connecté)
        -Recherche dans catalogue
        -connexion : 
            -Page connexion  :
                -Inscription et connexion
                - inscription on renseigne une delivery adress
            A la connexion, on donne un id à l'utilisateur via $SESSION["id"]
            si l'utilisateur ajoute au panier, on créé une commande avec custommer_id = $SESSION["id"]
        -Passer des infos de JS à Php pour ajouter plusieurs au panier (si possible)

    Idée :
        -Sur template.php, afficher un onglet 'Profil' même quand l'utilisateur n'est pas un admin ?
        -Vérif sur l'adresse mail pour pas créer plusieurs customers identiques

    Vraiment pas urgent :
        -Gérer bug sur la page inscription quand on efface ses données de navigation depuis celle ci


On ajoute un item dans le panier : 
    On créé une commande avec cet item et la quantité.
    Si l'utilisateur n'est pas connecté, on créé une commande avec la variable de session id, puis on récupere l'id de la commande qu'on met dans $SESSION["SESS_ORDERNUM"]. On track apres avec cette session. Quand on se connecte on merge les 2 commandes en regardant session.