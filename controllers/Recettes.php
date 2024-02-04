<?php
namespace controllers;

class Recettes extends \app\Controller
{
    public function index()
    {
        $this->loadModel('Recettes');
        $this->loadModel('Ingredients');

        $recettes = $this->Recettes->getAll();
        $ingredients = $this->Recettes->getAllRecette();
        $allIngredients = $this->Ingredients->getAllIngredients();

        $this->render('index', compact('recettes', 'ingredients', 'allIngredients'));
    }

    public function lire(string $slug)
    {
        $this->loadModel('Recettes');

        $recettes = $this->Recettes->findBySlug($slug);
        $ingredients = $this->Recettes->getAllRecette();

        $this->render('lire', compact('recettes', 'ingredients'));
    }

    public function create()
    {
        $titre = $_POST['titre'];
        $instructions = $_POST['instructions'];

        $this->loadModel('Recettes');
        $recettes = $this->Recettes->insertrecettes($titre, $instructions);

        header('Location: /recettes');
    }

    public function addIngredient()
    {
        $nom = htmlspecialchars($_POST['nom']);

        $this->loadModel('Ingredients');
        $this->Ingredients->create([
            'Nom_Ingredients' => $nom,
        ]);

        header('Location: /recettes');
    }
}
?>