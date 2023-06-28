<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\DashboardModel;
use App\Core\SQL;
use PDO;

class Dashboard
{

    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO("pgsql:host=database;dbname=pa-iw;port=5432", "pa-iw", "Response11");
        }catch(\Exception $e){
            die("Erreur SQL : ".$e->getMessage());
        }
        $classExploded = explode("\\", get_called_class());
        $this->table = "esgi_".end($classExploded);
    }


    public function index() {
        $view = new View('dashboard', 'back');
        $dashboardModel = new DashboardModel($this->pdo);
        $data = $dashboardModel->getAllData();

        $chartData = [];

        foreach ($data as $row) {
            $chartData[] = [
                'name' => $row['firstname'],
                'y' => (int) $row['lastname']
            ];
        }
        //var_dump($data);
    
        require_once(__DIR__ .'/../Views/dashboard.view.php');
    }
 /*   
    public function index(): void
    {
         $view = new View('dashboard', 'back');

        // Assigner les données récupérées à la vue, par exemple :
        //$view->assign('articles', $articles);
        //$view->assign('statistics', $statistics);

        // Afficher la vue
        $view->render();
    }

    */
}
