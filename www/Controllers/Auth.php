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
    
            // Effectuer les vérifications d'authentification
            // Vous pouvez utiliser votre modèle User pour vérifier les informations de connexion
            // et authentifier l'utilisateur
    
            // Exemple de vérification basique (à personnaliser selon votre logique d'authentification)
            if ($email === 'dine@example.com' && $password === 'dine@example.com') {
                // Authentification réussie
                // Redirigez l'utilisateur vers la page d'accueil ou une autre page appropriée
                header('Location: /dashboard');
                exit;
            } else {
                // Authentification échouée
                // Ajoutez un message d'erreur à afficher dans le formulaire de connexion
                $form->addError("Les informations de connexion sont incorrectes.");
            }
        }
    
        // Afficher le formulaire de connexion
        $view->render();
        //redirection vers la page dashboard
        /*header('Location: /dashboard.php');
        exit;*/
        
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
        echo "Page de déconnexion";
        session_destroy();
        header('Location: /login');
        exit;
    }

}