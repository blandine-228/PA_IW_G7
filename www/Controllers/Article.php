<?php
namespace App\Controllers;
use App\Core\View;
use App\datatable\articleTable;

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
        $allArticles = $article->getAll();
        // Afficher les articles dans une vue appropriée
        $table = new articleTable($allArticles);

        $view = new View('Article/read', 'back');
        $view->assign('table', $table->getConfig($allArticles));
        //$view->render();
    }

    public function create(): void
    {
        $form = new ArticleForm();
        $view = new View("Article/create", "back");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);
    
        if($form->isSubmitted() && $form->isValid()){
            $article = new ArticleModel();
            $article->setTitle($_POST['title']);
            $article->setContent($_POST['content']);
            $article->setUser_id($_POST['user_id']);
            $article->setCreated_at($_POST['created_at']);
            $article->save();
        }
    }
    
        
    }
    

    
