<?php
namespace app;
abstract class Model{
    // Informations de la base de données
    private $host = "localhost";
    private $db_name = "devoirrecette";
    private $username = "root";
    private $password = "";
    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;
    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;
    /**
    * Fonction d'initialisation de la base de données
    *
    * @return void
    */
    public function getConnection(){
        // On supprime la connexion précédente
        $this->_connexion = null;
    
        // On essaie de se connecter à la base
        try{
            $this->_connexion = new \mysqli($this->host, $this->username, $this->password, $this->db_name);
            $this->_connexion->set_charset("utf8");
        }catch(\mysqli_sql_exception $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    /**
    * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
    *
    * @return void
    */
    public function getOne(){
        $sql = "SELECT * FROM `".$this->table."`WHERE `id`=".$this->id;
        $query = $this->_connexion->query($sql);
        return $query->fetch_assoc();
    }

    /**
    * Méthode permettant d'obtenir tous les enregistrements de la table choisie
    *
    * @return void
    */
    public function getAll(){
        $sql = "SELECT * FROM `{$this->table}`";
        $query = $this->_connexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllIngredients(){
        $sql = "SELECT * FROM `{$this->table}`";
        $query = $this->_connexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getAllRecette(){
        $sql = "SELECT * FROM recettes_has_ingredients AS ir JOIN ingredients AS i ON ir.Ingredients_id_Ingredients = i.id_Ingredients JOIN recettes AS r ON ir.Recettes_id_Recettes = r.id_Recettes";
        $query = $this->_connexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function insertrecettes($titre, $instructions){
        $sql = "INSERT INTO ".$this->table." (`Titre`, `Instructions`) VALUES ('".$titre."', '".$instructions."')";  
        $query = $this->_connexion->query($sql);
    }
    
    public function getIdUpdate($id){
        $sql = "SELECT * FROM ".$this->table."WHERE id_Recettes=".$id;
        $query = $this->_connexion->query($sql);
        return $query->fetch_assoc();
    }

    public function update($id, $titre, $slug, $instructions){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("UPDATE ".$this->table." SET Titre=?, slug=?, Instructions=? WHERE id_Recettes = ?");
        $stmt->bind_param("ssii", $titre, $slug, $instructions, $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }
}
?>
    
    
    