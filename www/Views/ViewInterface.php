<?php
namespace App\Views;
Interface ViewInterface{
    public function getTitle(): String;

    public function setTitle(String $title): void;
}