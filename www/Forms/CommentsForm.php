<?php

namespace App\Forms;
use App\Core\Validator;


class CommentsForm extends Validator
{
    public $method = "POST";
    protected array $config = [];

    public function getConfig():array{
            
            $this->config = [
                "config" => [
                    "method" => $this->method,
                    "action" => "", // L'action du formulaire, à définir selon vos besoins
                    "id" => "comments-form",
                    "class" => "form",
                    "enctype" => "",
                    "submit" => "Create Comment",
                    "reset" => "Réinitialiser"
                ],
                "inputs" => [
                    "content" => [
                        "id" => "comments-form-content",
                        "class" => "form-input",
                        "placeholder" => "Content",
                        "type" => "text",
                        "error" => "Your content is incorrect",
                        "required" => true
                    ],

                ]
            ];
    
            return $this->config;
    }
}