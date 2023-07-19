<?php 
namespace App\Controllers;

use App\Core\View;
use App\datatable\pagesTable;
use App\Forms\PagesForm;
use App\Forms\CreatePagesForm;
use App\Forms\UpdatePagesForm;
use App\Forms\DeletePagesForm;
use App\Models\Pages as PagesModel;
use App\Models\User;


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
            $pages->setCreated_by($_SESSION['user_id']); // Définir l'ID de l'utilisateur qui a créé la page
            $pages->setSlug($_POST['slug']);
            $pages->setStatus(0); 
            $pages->save();

        

        
         header('Location: /pages');
            exit;
        }

        // Afficher la vue du formulaire de création
        $view->render();
    }

  


    public function update($params): void
    {
        $id = $params['id'];  // Récupère l'ID de l'utilisateur à partir des paramètres de l'URL
        
        $pagesModel = new PagesModel();
        $pages = $pagesModel->getOneWhere(["id"=> $id ]);  
        if (!$pages) {
            throw new \Exception('Page not found');
        }
        
        $form = new UpdatePagesForm();
        
        $view = new View("Pages/update", "back");
        $view->assign("form", $form->getConfig($pages));
        $view->assign("formErrors", $form->errors);
        
            if($form->isSubmitted() && $form->isValid()){
                $pages->setTitle($_POST['title']);
                $pages->setContent($_POST['content']);
                $pages->setSlug($_POST['slug']);
                $pages->setStatus($_POST['status']);
                $pages->save();
                header('Location: /pages');
            }
    }


        public function delete($params): void
        {
            $id = $params['id'];
        
            $pages =  PagesModel::getInstance();
            $pages = $pages->getOneWhere(["id"=> $id ]);  
            if (!$pages) {
                throw new \Exception('Page not found');
            }
        
            $pages->delete();
        
            header('Location: /pages');
        }
        

        public function publish($params): void
        {
            $id = $params['id'];  // Récupère l'ID de la page à partir des paramètres de l'URL
        
            $pagesModel = new PagesModel();
            $pages = $pagesModel->getOneWhere(["id"=> $id ]);  
            if (!$pages) {
                throw new \Exception('Page not found');
            }
        
            $pages->setStatus(1);  // Change le statut de la page à 1 (publié)
            $pages->save();
        
            header('Location: /pages');  // Redirige l'utilisateur vers la liste des pages
        }



    //unpublished page

    public function unpublish($params): void
{
    $id = $params['id'];  // Récupère l'ID de la page à partir des paramètres de l'URL

    $pagesModel = new PagesModel();
    $pages = $pagesModel->getOneWhere(["id"=> $id ]);  
    if (!$pages) {
        throw new \Exception('Page not found');
    }

    $pages->setStatus(0);  // Change le statut de la page à 0 (non publié)
    $pages->save();

    header('Location: /pages');  // Redirige l'utilisateur vers la liste des pages
}



public function show(): void
{
    if (!isset($_GET['slug'])) {
        throw new \Exception("No slug provided");
    }

    $slug = $_GET['slug'];

    $pagesModel = new PagesModel();
    $page = $pagesModel->getOneWhere(["slug" => $slug, "status" => 1]);  

    if (!$page) {
        http_response_code(404);
        include('path/to/your/404.php');
        exit;
    }

    $view = new View("Pages/show", "front");
    $view->assign("page", $page);
    $view->render();
}







//show page








}