<?php

namespace App\Controllers;

use App\Core\View;

class Main
{
    public function home(): void
    {
        $pseudo = "Prof";
        $view = new View("Main/home", "front");
        $view->assign("pseudo", $pseudo);
        $view->assign("age", 30);
        $view->assign("title", "Bienvenue sur le site");
    }

    public function contact(): void
    {
        echo "Page de contact";
    }

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

    public function fourOFour()
    {
        $view = new View("Main/404", "front");
        $view->assign("title" , "404 - Page introuvable");
    }

}