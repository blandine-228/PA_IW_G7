<?php
namespace APP\Models;
use PDO;


class DashboardModel {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllData() {
        $query = "SELECT * FROM esgi_user";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData() {
        //A continuer demain matin 
        // Code pour récupérer les données du tableau de bord depuis la base de données ou toute autre source
        $data = array(/* Nos données récupérées */);
        return $data;

        
    }
}
?>