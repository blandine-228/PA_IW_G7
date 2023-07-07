<?php
namespace App\Models;
use PDO;

class Dashboard {

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
        $data = array(/* Nos données récupérées */);
        return $data;
    }
}
?>