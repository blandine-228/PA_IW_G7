<?php

namespace App\Forms;

use App\Core\Validator;

class InstallerStep1 extends Validator
{
    public $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "", // L'action du formulaire, à définir selon vos besoins
                "id" => "installer-step-1-form",
                "class" => "form",
                "enctype" => "",
                "submit" => "Valider",
                "reset" => "Réinitialiser"
            ],
            "formFields" => [
                "DB_TYPE" => [
                    "id" => "installer-step-1-form",
                    "class" => "input input-bordered input-info w-full max-w-xs",
                    "placeholder" => "Technologie",
                    "type" => "text",
                    "error" => "Technologie incorrecte",
                    "required" => true,
                    "labelClass" => "uppercase bold"
                ],
                "DB_HOST" => [
                    "id" => "installer-step-1-form",
                    "class" => "input input-bordered input-info w-full max-w-xs",
                    "placeholder" => "Nom d'hôte",
                    "type" => "text",
                    "error" => "Nom d'hôte incorrect",
                    "required" => true,
                    "labelClass" => "uppercase bold"
                ],
                "DB_NAME" => [
                    "id" => "installer-step-1-form",
                    "class" => "input input-bordered input-info w-full max-w-xs",
                    "placeholder" => "Nom de la base",
                    "type" => "text",
                    "error" => "Le nom de la base est incorrect",
                    "required" => true,
                    "labelClass" => "uppercase bold"
                ],
                "DB_PORT" => [
                    "id" => "installer-step-1-form",
                    "class" => "input input-bordered input-info w-full max-w-xs",
                    "placeholder" => "Port",
                    "type" => "number",
                    "lenght" => "4",
                    "error" => "Le port est incorrect",
                    "required" => true,
                    "labelClass" => "uppercase bold"
                ],
                "DB_USERNAME" => [
                    "id" => "installer-step-1-form",
                    "class" => "input input-bordered input-info w-full max-w-xs",
                    "placeholder" => "Nom d'utilisateur",
                    "type" => "text",
                    "error" => "Votre nom d'utilisateur est incorrect",
                    "required" => true,
                    "labelClass" => "uppercase bold"
                ],
                "DB_PASSWORD" => [
                    "id" => "installer-step-1-form",
                    "class" => "input input-bordered input-info w-full max-w-xs",
                    "placeholder" => "Mot de passe",
                    "type" => "password",
                    "error" => "Le mot de passe est incorrect",
                    "required" => true,
                    "labelClass" => "uppercase bold"
                ]
            ]
        ];

        return $this->config;
    }
}