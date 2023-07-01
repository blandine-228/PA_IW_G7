<?php

namespace App\Forms;
use App\Core\Validator;


class PagesForm extends Validator
{
    public $method = "POST";
    protected array $config = [];

    public function getConfig():array{
            
            $this->config = [
                "config" => [
                    "method" => $this->method,
                    "action" => "", // L'action du formulaire, à définir selon vos besoins
                    "id" => "pages-form",
                    "class" => "form",
                    "enctype" => "",
                    "submit" => "Create page",
                    "reset" => "Réinitialiser"
                ],
                "inputs" => [
                    "title" => [
                        "id" => "pages-form-title",
                        "class" => "form-input",
                        "placeholder" => "Title",
                        "type" => "text",
                        "error" => "Your title is incorrect",
                        "required" => true
                    ],
                    "content" => [
                        "id" => "pages-form-content",
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