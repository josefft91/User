<?php

namespace AttractionsIo\Domain;

use InvalidArgumentException;

class Name {
    private $name;

    public function __construct(string $name)
    {
        if(strlen($name) > 32) {
            throw new InvalidArgumentException(sprintf('%s exceeds 32 characters', $name));
        }    
        
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function equals(Name $name) : bool
    {
        return $this->name === $name->getName();
    }
}