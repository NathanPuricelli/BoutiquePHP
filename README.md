# Boutique

Cite d'e-commerce réalisé dans le cadre de l'UE Web par Nathan Puricelli et Aymeric Leto les meilleurs de l'info.

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

Difficultés et solutions : 

Comment faire fonctionner le site :
    -Importer la base de données web4shop2021.sql dans un serveur local gérant MySQL tel que XAMPP.
    -Créer un utilisateur MySQL avec pour nom 'userepul' et comme MDP 'epul' et lui accorder les droits sur la base web4shop.
    -Ou alors, changer dans le fichier de configuration Model/Model.php la fonction 'getBDD()' en modifiant les variables $dbuser et $dbpwd
    -Vous pourrez ensuite acceder au site en allant sur la page index.php du site.

Comment acceder au pannel admin (validation des commandes, visualisation des factures...) :
    -Connectez-vous comme un utilisateur classique avec le nom d'utilisatuer 'admin' et le MDP 'admin'
    -Vous pourrez ensuite gérer les différents admins et les différentes commandes.


Lien du projet sur la forge lyon 1 : https://forge.univ-lyon1.fr/p1907453/boutique
Vidéo de présentation du site : 