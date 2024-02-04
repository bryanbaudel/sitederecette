<?php
namespace models;

class Ingredients extends \app\Model
{
    public function __construct()
    {
        $this->table = "ingredients";
        $this->getConnection();
    }

    public function create($data)
    {
        $sql = "INSERT INTO " . $this->table . " (Nom_Ingredients) VALUES (?)";

        $stmt = $this->_connexion->prepare($sql);
        $stmt->bind_param("s", $data['Nom_Ingredients']);
        $stmt->execute();
    }
}
?>