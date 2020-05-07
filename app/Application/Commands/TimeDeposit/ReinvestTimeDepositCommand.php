<?php


namespace App\Application\Commands\TimeDeposit;

class ReinvestTimeDepositCommand
{
    private string $fullName;
    private float $finalBalance;
    private float $amount;
    private int $days;
    private bool $approve;

    public function __construct(string $fullName, bool $approve, float $initAmount, float $finalBalance, int $days)
    {
        $this->fullName = $fullName;
        $this->finalBalance = $finalBalance;
        $this->amount = $initAmount;
        $this->days = $days;
        $this->approve = $approve;
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
    public function getFinalBalance(): float
    {
        return $this->finalBalance;
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

    /**
     * @return bool
     */
    public function isApprove(): bool
    {
        return $this->approve;
    }
}
