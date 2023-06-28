<?php 
namespace App\Controllers;

use App\Core\View;
use App\Forms\CreateUserForm;
use App\Forms\UpdateUserForm;
use App\Forms\DeleteUserForm;
use App\Models\User;

class UserController {
    public function read() {
        // Récupérer tous les utilisateurs
        $user = new User();
        $allUsers = $user->getAll();

        // Utilisez $allUsers pour renvoyer ou afficher les utilisateurs
        $view = new View("User/read", "back");
        $view->assign("users", $allUsers);
    }

    public function create() {
        $form = new CreateUserForm();
        $view = new View("User/create", "back");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);

        // Form valid and submitted?
        if($form->isSubmited() && $form->isValid()){
            // Créer l'utilisateur...
        }
    }

    public function update($id) {
        // Récupérer l'utilisateur
        $user = User::getOne($id);

        $form = new UpdateUserForm();
        $view = new View("User/update", "back");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);
        // Form valid and submitted?
        if($form->isSubmited() && $form->isValid()){
            // Mettre à jour l'utilisateur...
        }
    }

    public function delete($id) {
        // Récupérer l'utilisateur
        $user = User::getOne($id);

        $form = new DeleteUserForm();
        $view = new View("User/delete", "back");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);

        // Form valid and submitted?
        if($form->isSubmited() && $form->isValid()){
            // Supprimer l'utilisateur...
        }
    }
}
