<?php

namespace App\Controllers;

use App\Core\View;


class Page {

    public function main()
    {
        $view = new View('pages/main', 'front');
    }

}