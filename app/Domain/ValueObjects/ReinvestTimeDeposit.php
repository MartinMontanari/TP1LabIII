<?php


namespace App\Domain\ValueObjects;


class ReinvestTimeDeposit
{
    private string $fullName;
    private array $timeDeposits;
    private int $days;

    public function __construct(string $fullName, array $timeDeposits, int $days)
    {
        $this->fullName = $fullName;
        $this->days=$days;
        $this->timeDeposits = $timeDeposits;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getTimeDeposits(): string
    {
        return implode($this->timeDeposits);
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

}
