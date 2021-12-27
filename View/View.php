<?php

class View {

    // Nom du fichier associé à la vue
    private $file;
    
    // Titre de la vue (défini dans le file vue)
    private $titre;

    public function __construct($action) {
        // Détermination du nom du file vue à partir de l'action
        $this->file = "View/View" . $action . ".php";
    }

    // Génère et affiche la vue
    public function generer($data = null) {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->file, $data);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('View/template.php',
                array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }

    // Génère un file vue et renvoie le résultat produit
    private function genererFichier($file, $data) {
        if (file_exists($file)) {
            // Rend les éléments du tableau $data accessibles dans la vue
            if ($data != null) extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le file vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }

}