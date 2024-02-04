<?php
namespace app;

abstract class Controller {
    // Déclarez les propriétés pour stocker les instances des modèles utilisés dans les contrôleurs enfants
    protected $Articles;
    protected $Recettes;
    protected $Ingredients;

    /**
    * Permet de charger un modèle
    *
    * @param string $model
    * @return void
    */
    public function loadModel(string $model) {
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT . 'models/' . $model . '.php');
        // Le modèle souhaité se trouve dans le namespace models
        $modelClass = "\\models\\" . $model;
        // On crée une instance de ce modèle et on le stocke dans une propriété de la classe
        $this->{$model} = new $modelClass();
    }

    /**
    * Afficher une vue
    *
    * @param string $fichier
    * @param array $data
    * @return void
    */
    public function render(string $fichier, array $data = []) {
        // Récupère les données et les extrait sous forme de variables
        extract($data);
        
        // On démarre le buffer de sortie
        ob_start();

        // Crée le chemin et inclut le fichier de vue
        require_once(ROOT . 'views/' . strtolower(str_replace("Controller", "", basename(str_replace('\\', '/', get_class($this))))) . '/' . $fichier . '.php');
        
        // On stocke le contenu dans $content
        $content = ob_get_clean();
       
        // On fabrique le "template"
        require_once(ROOT . 'views/layout/default.php');
    }
}
?>
