<?php

namespace App\Models;

use App\Core\SQL;
class User extends SQL
{
    private Int $id = 0;
    protected String $firstname;
    protected String $lastname;
    protected String $email;
    protected String $pwd;
    protected Int $status = 0;
    private ?String $date_inserted;
    private ?String $date_updated;
    protected String $role = "user"; // Nouvel attribut pour le rôle
    protected ?String $verificationToken;

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
     * @return String
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }

    /**
     * @return String
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param String $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = strtoupper(trim($lastname));
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = strtolower(trim($email));
    }

    /**
     * @return String
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param String $pwd
     */
    public function setPwd(string $pwd): void
    {
        $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
    }

  

   
    /**
     * @return Int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param Int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getDateInserted(): \DateTime
    {
        return $this->date_inserted;
    }

    /**
     * @param \DateTime $date_inserted
     */
    public function setDateInserted(\DateTime $date_inserted): void
    {
        $this->date_inserted = $date_inserted;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdated(): \DateTime
    {
        return $this->date_updated;
    }

    /**
     * @param \DateTime $date_updated
     */
    public function setDateUpdated(\DateTime $date_updated): void
    {
        $this->date_updated = $date_updated;
    }


     /**
     * @return String
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param String $role
     */
    public function setRole(?string $role): void
    {
        $this->role = $role;
    }
    

  
    

    
    

    /**
     * @return String
     */
    public function getVerificationToken(): ?string
    {
        return $this->verificationToken;
    }

    /**
     * @param String $verificationToken
     */
    public function setVerificationToken(string $verificationToken): void
    {
        $this->verificationToken = $verificationToken;
    }
}