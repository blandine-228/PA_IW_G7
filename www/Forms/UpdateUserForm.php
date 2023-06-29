<?php

namespace App\Forms;

use App\Core\Validator;

class UpdateUserForm extends Validator
{
    public $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "", // L'action du formulaire, à définir selon vos besoins
                "id" => "update-user-form",
                "class" => "form",
                "enctype" => "",
                "submit" => "Mettre à jour l'utilisateur",
            ],
            "inputs" => [
                "id" => [
                    "type" => "hidden",
                    "required" => true,
                ],
                "firstname" => [
                    "id" => "update-user-form-firstname",
                    "class" => "form-input",
                    "placeholder" => "Prénom de l'utilisateur",
                    "type" => "text",
                    "error" => "Votre prénom est incorrect",
                    "required" => true
                ],
                "lastname" => [
                    "id" => "update-user-form-lastname",
                    "class" => "form-input",
                    "placeholder" => "Nom de l'utilisateur",
                    "type" => "text",
                    "error" => "Votre nom est incorrect",
                    "required" => true
                ],
                "email" => [
                    "id" => "update-user-form-email",
                    "class" => "form-input",
                    "placeholder" => "Email de l'utilisateur",
                    "type" => "email",
                    "error" => "Votre email est incorrect",
                    "required" => true
                ],
                "role" => [
                    "id" => "update-user-form-role",
                    "class" => "form-input",
                    "placeholder" => "Rôle de l'utilisateur",
                    "type" => "text",
                    "error" => "Le rôle de l'utilisateur est incorrect",
                    "required" => true
                ],
                "status" => [
                    "id" => "update-user-form-status",
                    "class" => "form-input",
                    "placeholder" => "Statut de l'utilisateur",
                    "type" => "text",
                    "error" => "Le statut de l'utilisateur est incorrect",
                    "required" => true
                ]
            ]
        ];

        return $this->config;
    }
    


    public function isSubmitted(): bool
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }
}
