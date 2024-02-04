<?php

namespace controllers;

class Panier extends \app\Controller
{
    public function index()
    {
        $this->render('index');
    }

    public function create()
    {
        $titre = $_POST['titre'];
        $instructions = $_POST['instructions'];

        // Logique pour sauvegarder la recette dans la base de données

        header('Location: /recettes');
    }

    public function formulaire()
    {
        $this->render('formulaire');
    }
}
?>
