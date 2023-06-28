<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;

class Auth
{
    public function login(): void
    {
        echo "Page de connexion";
        $form = new Login();
        $view = new View("Auth/login", "front");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);
    
        // Formulaire soumis et valide
        if ($form->isSubmited() && $form->isValid()) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User();

            // Chercher l'utilisateur par email
            $user = $user->getOneWhere(["email" => $email]);
    
            // Vérifier si l'utilisateur existe et le mot de passe est correct
            if ($user && password_verify($password, $user->getPwd())){
                // Authentification réussie
                // Redirigez l'utilisateur vers la page d'accueil ou une autre page appropriée
                header('Location: /dashboard');
                exit;
            } else {
                // Authentification échouée
                // Ajoutez un message d'erreur à afficher dans le formulaire de connexion
               echo "Erreur d'authentification";
            }

        }
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
        //redirection vers la page de login
        /*header('Location: /login');
        exit;*/


    }

    public function logout(): void
    {
        session_destroy();
        echo "Page de déconnexion";
        header('Location: /login');
        exit;
    }

}