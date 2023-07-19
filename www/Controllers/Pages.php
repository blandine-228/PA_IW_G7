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
use App\Models\Memento;


class Pages {

    private $pageModel;
    private $mementos = [];

    public function __construct() {
        $this->pageModel = new PagesModel();
    }


    public function onPageSave($currentState) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $currentState = $_POST["content"];
        }
        $this->mementos[] = new Memento($currentState);

        // Mettre à jour le modèle de page avec le nouvel état
        $this->pageModel->setState($currentState);
    }

    public function onPageUndo() {
        if (!empty($this->mementos)) {
            // Restauration de l'état précédent depuis le dernier memento
            $lastMemento = array_pop($this->mementos);
            $this->pageModel->setState($lastMemento->getState());
        }
    }

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


        //read page front

    public function readFront()
    {
        $pagesModel = PagesModel::getInstance();
        $allPages = $pagesModel->getAll();

        $view = new View("Pages/readFront", "front");
        $view->assign("pages", $allPages);

        $view->render();
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




//show page

    public function show($params)
    {
        $slug = $params['slug'];
        var_dump($slug);

        $pagesModel = PagesModel::getInstance();
        $pages = $pagesModel->getOneWhere(["slug"=> $slug ]);  
        if (!$pages) {
            echo "Page not found";
        }

        $view = new View("Pages/show", "front");
        $view->assign("pages", $pages);

        $view->render();
    }








}