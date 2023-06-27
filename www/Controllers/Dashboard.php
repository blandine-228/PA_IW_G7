<?php

namespace App\Controllers;

use App\Core\View;

class Dashboard
{
    public function index(): void
    {
        // Vous pouvez effectuer ici toutes les opérations nécessaires pour récupérer les données à afficher sur le tableau de bord

        // Par exemple, récupérer la liste des articles, les statistiques, etc.

        // Créer une instance de la classe View et lui passer le nom de la vue à afficher (dashboard.view.php) ainsi que le nom du template (front.tpl.php ou back.tpl.php selon votre configuration)
        $view = new View('dashboard', 'back');

        // Assigner les données récupérées à la vue, par exemple :
        //$view->assign('articles', $articles);
        //$view->assign('statistics', $statistics);

        // Afficher la vue
        $view->render();
    }
}
