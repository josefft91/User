<?php 

namespace AttractionsIo\Domain;
use DateTime;
use InvalidArgumentException;

class DateOfBirth {
    private $day;
    private $month;
    private $year;

    public function __construct(int $day, int $month, int $year)
    {
        if($day < 1 || $day > 31) {
            throw new InvalidArgumentException(sprintf('%s should be in range %d-%d', $day, 1, 31));
        }

        if($month < 1 || $month > 12) {
            throw new InvalidArgumentException(sprintf('%s should be in range %d-%d', $month, 1, 12));
        }

        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function getAge() : int 
    {
        $date_from = new DateTime();
        $date_from->setDate($this->getYear(), $this->getMonth(), $this->getDay());
        $date_from->setTime(0, 0, 0);

        $date_to = new DateTime('now');
        $interval = $date_from->diff($date_to);

        return $interval->y;
    }

    public function getDay() : int 
    {
        return $this->day;
    }

    public function getMonth() : int
    {
        return $this->month;
    }

    public function getYear() : int
    {
        return $this->year;
    }

    public function equals(DateOfBirth $dateOfBirth) : bool
    {
        return 
            $this->day === $dateOfBirth->getDay()
        &&  $this->month === $dateOfBirth->getMonth()
        &&  $this->year === $dateOfBirth->getYear();
    }
}