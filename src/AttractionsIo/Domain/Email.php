<?php

namespace AttractionsIo\Domain;

use InvalidArgumentException;

class Email {
    private $email;

    public function __construct(string $email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid email address', $email));
        }      
        
        $this->email = $email;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function equals(Email $email) : bool
    {
        return $this->email === $email->getEmail();
    }
}