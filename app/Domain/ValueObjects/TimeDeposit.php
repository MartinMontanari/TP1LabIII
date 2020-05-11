<?php

namespace App\Domain\ValueObjects;

class TimeDeposit
{
    private string $fullName;
    private float $finalBalance;
    private float $amount;
    private int $days;

    public function __construct(string $fullName, float $initAmount, float $finalBalance, int $days)
    {
        $this->fullName = $fullName;
        $this->finalBalance = $finalBalance;
        $this->amount = $initAmount;
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
    public function getInitAmount(): float
    {
        return $this->amount;
    }



    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getFinalBalance(): float
    {
        return $this->finalBalance;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

    /**
     * @return array
     */
    public function __serialize(): array
    {
        return [
            'amount' => $this->amount,
            'finalBalance' => $this->finalBalance,
            'fullName' => $this->fullName,
            'days' => $this->days
        ];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'Nombre y apellido: ' . $this->fullName .
            ', Monto inicial:' . $this->amount .
            ', Balance Final: ' . $this->finalBalance .
            ' , Duración: ' . $this->days;
    }
}

