<?php

namespace App\datatable;




class pagesTable 
{
  
    protected array $config = [];
    private  $pages;

    public function __construct($pages)
    {
        $this->pages = $pages;
    }
    
    public function getConfig($pages): array
    {

        $this->config = [

            "config" => [
                "id" => "pages-table",
                "class" => "table",
            ],
            "headers" => [
                
                "Title" => "Title",
                "Content" => "Content",
            ],
            "body" =>[
                "title" => "title",
                "content" => "content",
            ],
            "data" => $this->pages,
            "actions" => [
                "update" => "/pages_update?id=",
                "delete" => "/pages_delete?id=",
            ],
              
        ];
    

        return $this->config;
    }
}
