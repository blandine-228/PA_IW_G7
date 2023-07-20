<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Dashboard as DashC;
use App\Core\SQL;
use PDO;

class Dashboard
{
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
