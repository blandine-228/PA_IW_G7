<?php

namespace App\Models;


use App\Models\Comments as CommentsModel;
use App\Core\SQL;

class Comments extends SQL{

    private Int $id = 0;
    protected String $content; 
    protected ?String $user;
    protected ?String $created_at;
    public function __construct(){
        parent::__construct();
    }

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
     * Get the value of user
     * @return String
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * Set the value of user
     * @param String $content
     */
    public function setUser(string $user): void
    {
        $this->user = trim($user);
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


}