<?php


// Charger et analyser le fichier routing.yml
$routes = yaml_parse_file('routes.yml');

// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];

// Parcourir les routes définies
foreach ($routes['routes'] as $route) {
    if ($request === $route['path']) {
        // Inclure le fichier du contrôleur
        $route['controller'] . '.php';

        // Instancier le contrôleur
        $controller = new $route['controller']();

        // Appeler l'action du contrôleur
        $action = $route['action'];
        $controller->$action();

        // Sortir de la boucle, nous avons trouvé la route correspondante
        break;
    }
}