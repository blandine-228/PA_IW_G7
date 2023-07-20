<?php

namespace App\Forms;

use App\Core\Validator;

class Login extends Validator
{
    public $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "", // L'action du formulaire, à définir selon vos besoins
                "id" => "login-form",
                "class" => "form",
                "enctype" => "",
                "submit" => "Se connecter",
                "reset" => "Réinitialiser"
            ],
            "formFields" => [
                "email" => [
                    "id" => "login-form-email",
                    "class" => "input input-bordered input-info w-full max-w-xs",
                    "placeholder" => "Courriel",
                    "type" => "email",
                    "error" => "Votre email est incorrect",
                    "required" => true,
                    "labelClass" => "uppercase bold"
                ],
                "password" => [
                    "id" => "login-form-password",
                    "class" => "input input-bordered input-info w-full max-w-xs",
                    "placeholder" => "Mot de passe",
                    "type" => "password",
                    "error" => "Votre mot de passe est incorrect",
                    "required" => true,
                    "labelClass" => "uppercase bold"
                ]
            ]
        ];

        return $this->config;
    }
}
