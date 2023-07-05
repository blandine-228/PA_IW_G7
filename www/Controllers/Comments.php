<?php

namespace App\Controllers;
use App\Core\View;
use App\Models\Comments as CommentsModel;
use App\Forms\CommentsForm;
use App\Forms\CreateCommentsForm;
use App\datatable\commentsTable;

class Comments
{
    public function read() {
        // Récupérer tous les commentaires
        $comments =  CommentsModel::getInstance();
        $allComments = $comments->getAll();
     
        $table = new commentsTable($allComments);

        $view = new View("Comments/read", "back");
        $view->assign("table", $table->getConfig($allComments));

         
    }

    public function create(): void
    {
        $form = new CommentsForm();
        $view = new View("Comments/create", "back");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);
    
        if($form->isSubmitted() && $form->isValid()){
            $comments = new CommentsModel();
            $comments->setContent($_POST['content']);
            $comments->save();
            header('Location: /comments_read');
        }

    }

}