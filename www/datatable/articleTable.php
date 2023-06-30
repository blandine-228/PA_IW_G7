<?php

namespace App\datatable;




class articleTable 
{
  
    protected array $config = [];
    private  $articles;

    public function __construct($articles)
    {
        $this->articles = $articles;
    }
    
    
    public function getConfig($articles): array
    {

        $this->config = [

            "config" => [
                "id" => "article-table",
                "class" => "table",
            ],
            "headers" => [
                
                "title" => "Title",
                "content" => "Content",
                //"user_id" => "User_id",
                "author" => "Author",
                "Created_at" => "Date Creation",
            ],
            "body" =>[
                "title" => "Title",
                "content" => "Content",
                //"user_id" => "User_id",
                "author" => "Author",
                "Created_at" => "Created_at",
            ],
            "data" => $this->articles,
            "actions" => [
                "update" => "/user_update?id=",
                "delete" => "/article_delete?id=",
            ],
              
        ];
    

        return $this->config;
    }
}
