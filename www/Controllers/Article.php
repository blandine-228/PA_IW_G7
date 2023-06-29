<?php
namespace App\Controllers;
use App\Core\View;
use App\Forms\CreateArticleForm;
use App\Forms\UpdateArticleForm;
use App\Forms\DeleteArticleForm;
use App\Models\Article as ArticleModel;
use App\Models\User;
use App\Forms\ArticleForm;

class Article{
    
    public function read()
    {
        
        // Récupérer tous les articles depuis la base de données
        $article = ArticleModel::getInstance();
        $articles = $article->getAll();
        // Afficher les articles dans une vue appropriée
        $view = new View('Article/read', 'back');
        $view->assign('articles', $articles);
        $view->render();
    }

   




    
}