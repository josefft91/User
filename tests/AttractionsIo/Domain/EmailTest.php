<?php
namespace AttractionsIo\Domain;

use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\Email;
use InvalidArgumentException;

class EmailTest extends TestCase
{
    public function testEmailCanBeCreatedFromValidAddress() : void 
    {
        $this->assertInstanceOf(Email::class, new Email('user@example.com'));
    }

    public function testEmailCannotBeCreatedFromInvalidAddress() : void 
    {
        $this->expectException(InvalidArgumentException::class);
        new Email('invalid');
    }

    public function testEmailMaxChars() : void 
    {
        $this->expectException(InvalidArgumentException::class);
        new Email('hzjZNZQaFMdTBGKAWPNbLaMrcDYfJxhMqUzwdlEDOXHgGWIJScKfqpsArQxEIQBqzYliMQiFEejaejNeHzSqLScqevtwehjpCsVROJxxmCNIndyHDMhEtVDAMbnPyhDpcITzNfLCFbHiWmZJIYzXOgNJSYtlSVmdbzUPDBTKvqieoZnTDoxVGXLKsTwPGEtuWkEIXCAaxFUisdSpAsdtxPkSrLHVqjxZUXemmusLwLSUpIvTzGZ@example.com');
    }

    public function testIsEqualValueObject() : void
    {
        $email = new Email('user@example.com');
        $secondEmail = new Email('user@example.com');

        $this->assertTrue($email->equals($secondEmail));
    }
}