<?php
namespace AttractionsIo\Domain;

use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\DateOfBirth;
use InvalidArgumentException;

class DateOfBirthTest extends TestCase
{
    public function testValidDateOfBirthCreated() : void 
    {
        $this->assertInstanceOf(DateOfBirth::class, new DateOfBirth(21, 12, 2002));
    }

    public function testIsEqualValueObject() : void
    {
        $date_of_birth = new DateOfBirth(21, 12, 2002);
        $second_date_of_birth = new DateOfBirth(21, 12, 2002);

        $this->assertTrue($date_of_birth->equals($second_date_of_birth));
    }
}