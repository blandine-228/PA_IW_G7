<?php

namespace App\Controllers;


class SecurityController
{
    public function login(): void
    {
        echo "Page de connexion";
    }

    public function logout(): void
    {
        echo "Page de déconnexion";
    }
}