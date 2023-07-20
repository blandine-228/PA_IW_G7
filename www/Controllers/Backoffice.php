<?php
namespace App\Controllers;

use App\Core\View;
use App\Forms\InstallerStep1;
use App\Forms\InstallerStep2;
use App\Forms\InstallerStep3;

class Backoffice{
    public function step1(): void
    {
        $form = new InstallerStep1();
        $view = new View("Backoffice/installerStep1", "installer");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);

        // Formulaire soumis et valide
        if ($form->isSubmited() && $form->isValid()) {
            $DB_TYPE = $_POST['DB_TYPE'];
            $DB_HOST = $_POST['DB_HOST'];
            $DB_NAME = $_POST['DB_NAME'];
            $DB_PORT = $_POST['DB_PORT'];
            $DB_USERNAME = $_POST['DB_USERNAME'];
            $DB_PASSWORD = $_POST['DB_PASSWORD'];
        }


    }

    public function step2(): void
    {
        $form = new InstallerStep2();
        $view = new View("Backoffice/installerStep2", "installer");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);
    }

    public function step3(): void
    {
        $form = new InstallerStep3();
        $view = new View("Backoffice/installerStep2", "installer");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);
    }

    public function recap(): void
    {
        $form = new Recap();
        $view = new View("Backoffice/installerStep2", "installer");
        $view->assign("form", $form->getConfig());
        $view->assign("formErrors", $form->errors);

    }
}