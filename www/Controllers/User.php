<?php 
namespace App\Controllers;

use App\Core\View;
use App\datatable\userTable;
use App\Forms\CreateUserForm;
use App\Forms\UpdateUserForm;
use App\Forms\DeleteUserForm;
use App\Models\User as UserModel;
use App\Forms\UserForm;

class User {
    public function read() {
        // Récupérer tous les utilisateurs
        $user =  UserModel::getInstance();
        $allUsers = $user->getAll();
     
        $table = new userTable($allUsers);

        $view = new View("User/read", "back");
        $view->assign("table", $table->getConfig($allUsers));

       
       
    }

    public function create(): void
    {
        $form = new UserForm();
        $view = new View("User/create", "back");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);
    
        if($form->isSubmitted() && $form->isValid()){
            $user = new UserModel();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPwd(password_hash($_POST['password'], PASSWORD_BCRYPT));
            $user->setRole($_POST['role']);
            $user->setStatus(1); // Mettre le statut à 1, puisque l'admin crée l'utilisateur
            $user->save();
        }
    }
    
    public function update($params): void
    {
        $id = $params['id'];  // Récupère l'ID de l'utilisateur à partir des paramètres de l'URL
    
        $userModel = new UserModel();
        $user = $userModel->getOneWhere(["id"=> $id ]);  // Obtient l'utilisateur par son ID
        //var_dump($user);
        if (!$user) {
            throw new \Exception('User not found');
        }
    
        $form = new UpdateUserForm();
    
        $view = new View("User/update", "back"); // Déplacez cette ligne ici
        $view->assign("form", $form->getConfig($user)); // Modifiez cette ligne pour passer $user
        $view->assign("formErrors", $form->errors);
        if($form->isSubmitted() && $form->isValid()){
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
    
            // Seulement mettre à jour le mot de passe s'il est fourni
            if (!empty($_POST['password'])) {
                $user->setPwd(password_hash($_POST['password'], PASSWORD_BCRYPT));
            }
    
            $user->setRole($_POST['role']);
            $user->save();
        }
    }
    



    

    public function delete($id) {
        // Récupérer l'utilisateur
        $user = UserModel::getOne($id);

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
