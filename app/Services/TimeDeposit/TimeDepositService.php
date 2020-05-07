<?php


namespace App\Services\TimeDeposit;


use App\Application\Commands\TimeDeposit\ReinvestTimeDepositCommand;
use App\Application\TimeDeposit\TimeDepositCommand;
use App\Domain\ValueObjects\TimeDeposit;

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
        } else if ($command instanceof ReinvestTimeDepositCommand) {
            return $this->ReinvestTimeDeposit($command);
        }
    }

    private function DoTimeDeposit(TimeDepositCommand $command)
    {
        $days = $command->getDays();
        $amount = $command->getAmount();
        $fullName = $command->getFullName();

        $finalBalance = $this->calculation->PerformCalculation($amount, $days);
        return new TimeDeposit($finalBalance, $fullName);
    }

    private function ReinvestTimeDeposit(ReinvestTimeDepositCommand $command)
    {
        //TODO -->> $final
    }
}
