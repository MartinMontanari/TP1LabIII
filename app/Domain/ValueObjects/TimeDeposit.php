<?php


namespace App\Domain\ValueObjects;


class TimeDeposit
{
    private float $finalBalance;
    private string $fullName;

    public function __construct(float $finalBalance,string $fullName)
    {
        $this->finalBalance = $finalBalance;
        $this->fullName = $fullName;
    }

    /**
     * @return float
     */
    public function getFinalBalance(): float
    {
        return $this->finalBalance;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }
}
