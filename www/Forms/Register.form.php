<?php
namespace App\Forms;
use App\Core\Validator;

class Register extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"",
                    "id"=>"register-form",
                    "class"=>"form",
                    "enctype"=>"",
                    "submit"=>"Nous rejoindre",
                    "reset"=>"Annuler"
                ],
                "formFields"=>[
                    "firstname"=>[
                        "id"=>"register-form-firstname",
                        "class"=>"form-input",
                        "labelClass" => "",
                        "placeholder"=>"Votre prénom",
                        "type"=>"text",
                        "error"=>"Votre prénom doit faire entre 2 et 60 caractères",
                        "min"=>2,
                        "max"=>60,
                        "required"=>true
                    ],
                    "lastname"=>[
                        "id"=>"register-form-lastname",
                        "class"=>"form-input",
                        "labelClass" => "",
                        "placeholder"=>"Votre nom",
                        "type"=>"text",
                        "error"=>"Votre nom doit faire entre 2 et 120 caractères",
                        "min"=>2,
                        "max"=>120,
                        "required"=>true
                    ],
                    "email"=>[
                        "id"=>"register-form-email",
                        "class"=>"form-input",
                        "labelClass" => "",
                        "placeholder"=>"Votre email",
                        "type"=>"email",
                        "error"=>"Votre email est incorrect",
                        "required"=>true
                    ],
                    "pwd"=>[
                        "id"=>"register-form-pwd",
                        "class"=>"form-input",
                        "labelClass" => "",
                        "placeholder"=>"Votre mot de passe",
                        "type"=>"password",
                        "error"=>"Votre mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                        "required"=>true
                    ],
                    "pwdConfirm"=>[
                        "id"=>"register-form-pwd-confirm",
                        "class"=>"form-input",
                        "labelClass" => "",
                        "placeholder"=>"Confirmation",
                        "type"=>"password",
                        "error"=>"Votre mot de passe de confirmation ne correspond pas",
                        "required"=>true,
                        "confirm"=>"pwd"
                    ],
                ]
        ];
        return $this->config;
    }
}