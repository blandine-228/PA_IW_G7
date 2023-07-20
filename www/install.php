<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $host = $data["localhost"];
    $username = $data["pa-iw"];
    $password = $data["Response11"];
    $dbName = $data["pa-iw"];

    // Connexion à la base de données
    try {
        $pdo = new PDO("pgsql:host=$host", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Créer la base de données si elle n'existe pas
        $pdo->exec("CREATE DATABASE $dbName");

        // Utiliser la base de données nouvellement créée
        $pdo->exec("USE $dbName");

        // Créer les tables nécessaires pour le projet

        // Exemple de création d'une table utilisateurs
        $pdo->exec("
          CREATE TABLE IF NOT EXISTS users (
            id SERIAL PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
          )
        ");

        

        // Envoyer une réponse JSON indiquant que l'installation a réussi
        header("Content-Type: application/json");
        echo json_encode(["success" => true]);
    } catch (PDOException $e) {
        // Envoyer une réponse JSON indiquant que l'installation a échoué
        header("Content-Type: application/json");
        echo json_encode(["success" => false]);
    }
}