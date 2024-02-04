<?php

class Router
{
    private $routes = [];

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function defineRoutes()
    {
        $this->post('/recettes/addIngredient', 'Recettes@addIngredient');
        // Vous pouvez ajouter d'autres définitions de route ici.
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new Exception("Aucune route n’est définie pour cet URL.");
    }

    protected function callAction($controller, $action)
    {
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} ne répond pas à l’appel {$action} action."
            );
        }

        return $controller->$action();
    }
}
