<?php
namespace models;

class Recettes extends \app\Model{


    public function __construct()
    {
        $this->table = "recettes";
        $this->getConnection();
    }
/**
* Retourne un article en fonction de son slug
*
* @param string $slug
* @return void
*/

    public function findBySlug(string $slug)
    {
        $sql = "SELECT * FROM " . $this->table . " INNER JOIN recettes_has_ingredients ON id_Recettes = Recettes_Id_Recettes INNER JOIN ingredients ON id_Ingredients = Ingredients_Id_Ingredients WHERE slug='" . $slug . "'";
        $query = $this->_connexion->query($sql);

        return $query->fetch_assoc();
    }

     /**
     * Insère une nouvelle recette dans la base de données
     *
     * @param array $data Les données de la recette à insérer
     * @return void
     */
    
     public function create(array $data)
    {
        $sql = "INSERT INTO {$this->table} (Titre, Instructions, Total_Calorique, slug, Apport_Calorique) 
                VALUES ('{$data['Titre']}', '{$data['Instructions']}', '{$data['Total_Calorique']}', '{$data['slug']}', {$data['Apport_Calorique']}' )";

        $this->_connexion->query($sql);
    }
}
?>
