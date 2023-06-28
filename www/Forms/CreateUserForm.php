<?php
namespace App\Forms;

use App\Core\Form;

class CreateUserForm extends Form
{
    public function buildForm()
    {
        $this->setName("createUserForm");

        $this->setFields([
            "firstname" => [
                "type" => self::varChar(50),
                "label" => "Prénom",
                "required" => true,
                "error" => "Prénom invalide"
            ],
            "lastname" => [
                "type" => self::TYPE_TEXT,
                "label" => "Nom",
                "required" => true,
                "error" => "Nom invalide"
            ],
            "email" => [
                "type" => self::TYPE_EMAIL,
                "label" => "Email",
                "required" => true,
                "error" => "Email invalide"
            ],
            "pwd" => [
                "type" => self::TYPE_PASSWORD,
                "label" => "Mot de passe",
                "required" => true,
                "error" => "Mot de passe invalide"
            ]
        ]);
    }
}
