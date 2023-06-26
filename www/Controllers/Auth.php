<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Register;
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
        $form = new Register();
        $view = new View("Auth/register", "front");
        $view->assign("form", $form->getConfig());

        //Form validé ? et correct ?
        if($form->isSubmited() && $form->isValid()){
            $user = new User();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPwd($_POST['pwd']);
            $user->save();
        }
        $view->assign("formErrors", $form->errors);


    }

    public function logout(): void
    {
        echo "Page de déconnexion";
    }

}