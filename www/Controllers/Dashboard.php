<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Dashboard as DashC;
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
        $dashboardModel = new DashC($this->pdo);
        $data = $dashboardModel->getAllData();

        $chartData = [];

        foreach ($data as $row) {
            $chartData[] = [
                'name' => $row['firstname'],
                'y' => (int) $row['lastname']
            ];
        }
    }
}
