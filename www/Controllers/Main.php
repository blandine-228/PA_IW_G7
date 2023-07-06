<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Article as ArticleModel;
//use App\datatable\articleTable;
use App\datatable\articleTableFront;

class Main
{
   /* public function home(): void
    {
        $pseudo = "Prof";
        $view = new View("Main/home", "front");
        $view->assign("pseudo", $pseudo);
        $view->assign("age", 30);
        $view->assign("titleseo", "supernouvellepage");
    }*/

    public function contact(): void
    {
        echo "Page de contact";
    }

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

    public function home()
    {
         // Récupérer tous les articles depuis la base de données
         $article = ArticleModel::getInstance();
         $allArticles = $article->getAll();
         // Afficher les articles dans une vue appropriée
         $table = new articleTableFront($allArticles);
 
        // $view = new View('Article/read', 'back');
       
         $view = new View("Main/home", "front");
         $view->assign('table', $table->getConfig($allArticles));
         //$view->render()
    }

}