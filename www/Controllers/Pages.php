<?php 
namespace App\Controllers;

use App\Core\View;
use App\datatable\pagesTable;
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

}