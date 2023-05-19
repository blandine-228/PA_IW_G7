<?php

namespace App\Controllers;

use App\Core\View;

class MainController
{
    public function index()
    {
        // Action for the '/' route
        echo "Welcome to the homepage";
    }

    public function about()
    {
        // Action for the '/about' route
        echo "About Us";
    }

    public function contact()
    {
        // Action for the '/contact' route
        echo "Contact Us";
    }
}