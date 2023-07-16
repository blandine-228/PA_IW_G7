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
                "created_by" => "Created by",
            ],
            "body" =>[
                "title" => "title",
                "content" => "content",
                "created_by" => "created_by",
            ],
            "data" => $this->pages,
            "actions" => [
                "update" => "/pages/update?id=",
                "delete" => "/pages/delete?id=",
            ],
              
        ];
    

        return $this->config;
    }
}
