<?php
namespace App\Controllers;

use App\Core\View;
class Backoffice{
    public function installer(){
        $view = new View("Backoffice/installer", "installer");
    }
}