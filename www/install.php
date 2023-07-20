<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $host = $data["database"];
    $username = $data["pa-iw"];
    $password = $data["Response11"];
    $dbName = $data["pa-iw"];

    try {
        $pdo = new PDO("pgsql:host=$host", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Créer la base de données si elle n'existe pas
        $pdo->exec("CREATE DATABASE $dbName");

        // Utiliser la base de données nouvellement créée
        $pdo->exec("USE $dbName");

        // Création d'une table esgi_user
        $pdo->exec("
        DROP TABLE IF EXISTS esgi_user;
          CREATE TABLE IF NOT EXISTS esgi_user (
            id SERIAL PRIMARY KEY,
            firstname character varying NOT NULL,
            lastname character varying NOT NULL,
            email VARCHAR(255) NOT NULL,
            pwd VARCHAR(255) NOT NULL,
            country character varying,
            status integer,
            date_inserted timestamp,
            date_updated timestamp,
            role character varying NOT NULL,
            verificationtoken character varying(100),
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