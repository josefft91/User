<?php
namespace AttractionsIo\Domain;

use PHPUnit\Framework\TestCase;
use AttractionsIo\Domain\User;
use AttractionsIo\Domain\Email;
use AttractionsIo\Domain\DateOfBirth;
use AttractionsIo\Domain\Name;
use InvalidArgumentException;
use LengthException;

class UserTest extends TestCase
{

    public function testCanCreateUser() : void
    {
        $user = new User(13, new Name('Jo'), new Name('Thomas'), new DateOfBirth(11, 07, 1991), new Email('user@example.com'), 'test123');
        $this->assertInstanceOf(User::class, $user);
    }

    public function testFirstNameMaxChars() : void
    {
        $this->expectException(LengthException::class);
        new User(13, new Name('Yqoe7rdhnaZBfH2kKRcPgsJi5QHxCTSFC'), new Name('Thomas'), new DateOfBirth(11, 07, 1991), new Email('user@example.com'), 'test123');
    }

    public function testLastNameMaxChars() : void
    {
        $this->expectException(LengthException::class);
        new User(13, new Name('Jo'), new Name('Yqoe7rdhnaZBfH2kKRcPgsJi5QHxCTSFC'), new DateOfBirth(11, 07, 1991), new Email('user@example.com'), 'test123');
    }

    public function testPasswordMaxChars() : void
    {
        $this->expectException(LengthException::class);
        $user = new User(13, new Name('Jo'), new Name('Thomas'), new DateOfBirth(11, 07, 1991), new Email('user@example.com'), 'Yqoe7rdhnaZBfH2kKRcPgsJi5QHxCTSFC');
        $this->assertInstanceOf(User::class, $user);
    }

    public function testExceptionThrownUnder13YearsAge() : void
    {
        $this->expectException(InvalidArgumentException::class);
        new User(13, new Name('Jo'), new Name('Thomas'), new DateOfBirth(31, 23, 2011), new Email('user@example.com'), 'test123');
    }

    public function testCanGetCorrectAge() : void
    {
        $user = new User(13, new Name('Jo'), new Name('Thomas'), new DateOfBirth(11, 07, 1991), new Email('user@example.com'), 'test123');
        $this->assertEquals(29, $user->getAgeInYears());
    }
}