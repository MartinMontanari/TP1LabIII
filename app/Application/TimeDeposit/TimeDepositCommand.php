<?php


namespace App\Application\TimeDeposit;


class TimeDepositCommand
{
    private string $fullName;
    private float $amount;
    private int $days;

    public function __construct(string $fullName, float $amount, int $days)
    {
        $this->fullName = $fullName;
        $this->amount = $amount;
        $this->days = $days;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

}
