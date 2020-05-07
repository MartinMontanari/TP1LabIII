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

}
