<?php

namespace App\Controllers;

use App\Models\User;

class Auth
{
    public function login(): void
    {
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données de connexion soumises
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Redirigez l'utilisateur vers une page appropriée après la connexion réussie
            header("Location: dashboard.php");
            exit();
        }

        // Affichez le formulaire de connexion
        include 'Views/login.php';
    }

    public function register(): void
    {
        $user = new User();
        $user->setFirstname("admin");
        $user->setLastname("paw1");
        $user->setEmail("admin@admin.com");
        $user->setPwd("Test1234");
        $user->setCountry("FR");
        $user->save();

    }

    public function logout(): void
    {
        echo "Page de déconnexion";
    }

}