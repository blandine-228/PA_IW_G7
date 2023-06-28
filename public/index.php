<?php

namespace App;

//require "Core/View.php";
define("WWW_PATH", getenv("WWW_PATH"));
//Set database consts
define("DB_TYPE", getenv("DB_TYPE"));
define("DB_HOST", getenv("DB_HOST"));
define("DB_NAME", getenv("DB_NAME"));
define("DB_PORT", getenv("DB_PORT"));
define("DB_USERNAME", getenv("DB_USERNAME"));
define("DB_PASSWORD", getenv("DB_PASSWORD"));

spl_autoload_register(function ($class) {
    //$class = App\Core\View
    $class = str_replace("App\\","", $class);
    //$class = Core\View
    $class = str_replace("\\","/", $class);
    //$class = Core/View
    $classForm = $class.".form.php";
    $class = $class.".php";
    //$class = Core/View.php
    if(file_exists(WWW_PATH .$class)){
        include WWW_PATH . $class;
    }else if(file_exists(WWW_PATH . $classForm)){
        include WWW_PATH . $classForm;
    }
});

//Afficher le controller et l'action correspondant à l'URI
$uri = $_SERVER["REQUEST_URI"];
$uriExploded = explode("?", $uri);
$uri = strtolower(trim( $uriExploded[0], "/"));

if(empty($uri)){
    $uri = "default";
}

if(!file_exists(WWW_PATH . "routes.yml")){
    var_dump(getenv("WWW_PATH"));
    die("Le fichier routes.yml n'existe pas");
}

$routes = yaml_parse_file(WWW_PATH . "routes.yml");

if(empty($routes[$uri])){
    die("Page 404");
}

if(empty($routes[$uri]["controller"]) || empty($routes[$uri]["action"]) ){
    die("Cette route ne possède pas de controller ou d'action dans le fichier de routing");
}

$controller = $routes[$uri]["controller"];
$action = $routes[$uri]["action"];


// $controller => Auth ou Main
// $action=> home ou login


if(!file_exists(WWW_PATH . "Controllers/".$controller.".php")){
    die("Le fichier Controllers/".$controller.".php n'existe pas");
}
include WWW_PATH . "Controllers/".$controller.".php";

$controller = "\\App\\Controllers\\".$controller;

if(!class_exists($controller)){
    die("La classe ".$controller." n'existe pas");
}
$objController = new $controller();

if(!method_exists($objController, $action)){
    die("L'action ".$action." n'existe pas");
}

$objController->$action();
