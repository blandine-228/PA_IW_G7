<?php

namespace App\datatable;




class commentsTable 
{
  
    protected array $config = [];
    private  $comments;

    public function __construct($comments)
    {
        $this->comments = $comments;
    }
    
    public function getConfig($comments): array
    {

        $this->config = [

            "config" => [
                "id" => "comments-table",
                "class" => "table",
            ],
            "headers" => [
                
                "Content" => "Content",
               
            ],
            "body" =>[
                "Content" => "Content",
               
            ],
            "data" => $this->comments,
            "actions" => [
                "update" => "/comments_update?id=",
                "delete" => "/comments_delete?id=",
            ],
              
        ];
    

        return $this->config;
    }
}
