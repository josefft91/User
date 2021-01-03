<?php

namespace AttractionsIo\Domain;
use \AttractionsIo\Domain\DateOfBirth; 
use \AttractionsIo\Domain\Email;
use \AttractionsIo\Domain\Name;
use InvalidArgumentException;

class User {

    private $id;
    private $first_name;
    private $last_name;
    private $date_of_birth;
    private $email_address;
    private $password;

    public function __construct(
        int $id,
        Name $first_name,
        Name $last_name,
        DateOfBirth $date_of_birth,
        Email $email_address,
        string $password
    )
    {
        if($date_of_birth->getAge() < 13){
            throw new InvalidArgumentException(sprintf('Age should be at least 13 years old'));
        }

        if(strlen($password) > 32) {
            throw new InvalidArgumentException(sprintf('%s exceeds 32 characters', $password));
        }

        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
        $this->email_address = $email_address;
        $this->password = $password;
    }

    public function getId() : int
    {
        return $this->id;
    }
    
    public function getFirstName() : Name
    { 
        return $this->first_name;
    }

    public function getLastName() : Name
    {
        return $this->last_name;
    }

    public function getDateOfBirth() : DateOfBirth 
    {
        return $this->date_of_birth;
    }

    public function getAgeInYears() : int
    {
        return $this->date_of_birth->getAge();
    }

    public function getEmailAddress() : Email 
    {
        return $this->email_address;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function equals (User $user) : bool 
    {
        return $this === $user;
    }
}