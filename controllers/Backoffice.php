<?php
namespace controllers;

class BackOffice extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(){
        // On instancie le modèle "Articles"
        $this->loadModel('recettes');

        // On stocke la liste des articles dans $articles
        $backoffice = $this->recettes->getAll();

        // On envoie les données à la vue index
        $this->render('index', compact('backoffice')); 
    }

    public function delete($id){
        $this->loadModel('recettes');
        $articles = $this->recettes->delete($id);      
        echo "Article ".$id."Supprimer";
        header('Location: /views/backoffice');
    }

    public function update_insert(){
        $id = $_POST['id_Recettes'];
        $titre = $_POST['Titre'];
        $slug = $_POST['slug'];
        $instructions = $_POST['Instructions'];
        $this->loadModel('recettes');
        $backoffice = $this->recettes->update($id, $titre, $slug, $prix);
        echo "Modification de l'article ".$id;
        header('Location: /backoffice');
    }

    public function update_form($id){
        // On instancie le modèle "Articles"
        $this->loadModel('recettes');

        // On stocke la liste des articles dans $articles
        $backoffice = $this->recettes->getIdUpdate($id);
        
        // On envoie les données à la vue index
        $this->render('update', compact('backoffice')); 

    }
    
    public function insert($id){
        $id = $_POST['id_Recettes'];
        $titre = $_POST['Titre'];
        $slug = $_POST['slug'];
        $instructions = $_POST['Instructions'];
        $this->loadModel('Recettes');
        $articles = $this->Recettes->insert($id, $titre, $slug, $instructions);
        if(move_uploaded_file($_FILES['fichier']['tmp_name'], './img/'.$_FILES['fichier']['name']))
            echo 'File successfully uploaded';
        else
            echo 'File could not be uploaded';
        echo "Article ".$id." Ajouté";
        header('Location: /views/backoffice');
    }
        
}
?>