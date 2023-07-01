<?php

namespace App\Models;


use App\Models\Pages as PagesModel;
use App\Core\SQL;

class Pages extends SQL{
    private Int $id = 0;
    protected String $title;
    protected String $content;  
    protected ?String $created_at;
    protected ?String $updated_at;
    public function __construct(){
        parent::__construct();
    }

    // Getters & Setters

    /**
     * @return Int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the value of title
     * @return String
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     * @param String $title
     */
    public function setTitle(string $title): void
    {
        $this->title = ucwords(strtolower(trim($title)));
    }

    /**
     * Get the value of content
     * @return String
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     * @param String $content
     */
    public function setContent(string $content): void
    {
        $this->content = trim($content);
    }

    /**
     * Get the value of created_at
     * @return String
     */
    public function getCreated_at(): string
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     * @param String $created_at
     */
    public function setCreated_at(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * Get the value of updated_at
     * @return String
     */
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }
    
    /**
     * Set the value of updated_at
     * @param String $updated_at
     */
    public function setUpdated_at(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

}