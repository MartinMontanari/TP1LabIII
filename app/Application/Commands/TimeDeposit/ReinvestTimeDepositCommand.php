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

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getInitAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return bool
     */
    public function isApprove(): bool
    {
        return $this->approve;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getFinalBalance(): float
    {
        return $this->finalBalance;
    }

    public function getDays(): int
    {
        return $this->days;
    }

    public function __serialize(): array
    {
        return [
            'amount' => $this->amount,
            'finalBalance' => $this->finalBalance,
            'fullName' => $this->fullName,
            'days' => $this->days
        ];
    }

    public function __toString()
    {
        return 'Nombre y apellido: ' . $this->fullName .
            ', Monto inicial:' . $this->amount .
            ', Balance Final: ' . $this->finalBalance .
            ' , Duración: ' . $this->days;
    }
}
