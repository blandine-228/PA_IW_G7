<?php 
namespace App\Controllers;

use App\Core\View;
use App\datatable\pagesTable;
use App\Forms\PagesForm;
use App\Models\Pages as PagesModel;

class Pages {

    public function read() {
        // Récupérer toutes les pages
        $pages =  PagesModel::getInstance();
        $allPages = $pages->getAll();
     
        $table = new pagesTable($allPages);

        $view = new View("Pages/read", "back");
        $view->assign("table", $table->getConfig($allPages));

         
    }

    public function create(): void
    {
        $form = new PagesForm();
        $view = new View("Pages/create", "back");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);
    
        if($form->isSubmitted() && $form->isValid()){
            $pages = new PagesModel();
            $pages->setTitle($_POST['title']);
            $pages->setContent($_POST['content']);
            $pages->save();
        }
    }
}