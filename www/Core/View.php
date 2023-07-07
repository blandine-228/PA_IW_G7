<?php
namespace App\Core;

use App\Views\ViewInterface;

class View implements ViewInterface{
    private String $view;
    private String $template;
    private $data = [];
    private String $title = "";

    public function __construct(String $view, String $template = "back") {
        $this->setView($view);
        $this->setTemplate($template);
    }

    public function assign(String $key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function getTitle(): String
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @param String $view
     */
    public function setView(string $view): void
    {
        $this->view = WWW_PATH . "Views/".$view.".view.php";
        if(!file_exists($this->view)){
            die("La vue ".$this->view." n'existe pas");
        }
    }

    /**
     * @param String $template
     */
    public function setTemplate(string $template): void
    {
        $this->template = WWW_PATH . "Views/Templates/".$template.".tpl.php";
        if(!file_exists($this->template)){
            die("Le template ".$this->template." n'existe pas");
        }
    }

    public function partial(String $name, array $config, $errors = []): void
    {
        if(!file_exists(WWW_PATH . "Views/Partials/".$name.".ptl.php")){
            die("Le partial ".$name." n'existe pas");
        }
        include WWW_PATH . "Views/Partials/".$name.".ptl.php";
    }

    public function __destruct(){
        extract($this->data);
        include $this->template;
    }
}