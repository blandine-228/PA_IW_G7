<?php


namespace App\Controllers;
use Models\DashboardModel;

class Dashboard {

    public function admin() {
        $model = new DashboardModel();
        $data = $model->getData();

        // Chargez la vue du tableau de bord avec les données
        require 'Views/DashboardView.php';
    }
    
}

