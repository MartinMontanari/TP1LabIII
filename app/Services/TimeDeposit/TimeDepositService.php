<?php


namespace App\Services\TimeDeposit;


use App\Application\TimeDeposit\TimeDepositCommand;
use App\Domain\ValueObjects\TimeDeposit;
use App\Services\TimeDeposit\CalculationService;

class TimeDepositService
{
    private CalculationService $calculation;

    public function __construct
    (
        CalculationService $newCalculation
    )
    {
        $this->calculation = $newCalculation;
    }

    public function MakeTimeDeposit(TimeDepositCommand $command)
    {
        if ($command instanceof TimeDepositCommand) {
            return $this->DoTimeDeposit($command);
        }
    }

    private function DoTimeDeposit(TimeDepositCommand $command)
    {
        $days = $command->getDays();
        $amount = $command->getAmount();
        $fullName = $command->getFullName();

        $finalBalance = $this->calculation->PerformCalculation($amount,$days);
        return new TimeDeposit($finalBalance, $fullName);
    }
}
