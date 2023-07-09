<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Article;
use App\Models\Pages;

class Dashboard
{
    public function index(): void
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            // L'utilisateur n'est pas connecté, le rediriger vers la page de connexion
            header('Location: /login');

            exit;
        }

        // Nombre total d'utilisateurs
        $userModel = new User();
        $userCount = $userModel->count();
        

        // Nombre total d'articles
        $articleModel = new Article();
        $articleCount = $articleModel->count();

        // Nombre total de pages
        $pagesModel = new Pages();
        $pagesCount = $pagesModel->count();


        $view = new View('dashboard', 'back');
        $view->assign('userCount', $userCount);
        $view->assign('articleCount', $articleCount);
        $view->assign('pagesCount', $pagesCount);
       
        // Afficher la vue
        $view->render();
    }



    
    
}
