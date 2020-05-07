<?php


namespace App\Services\TimeDeposit;


use App\Application\Commands\TimeDeposit\ReinvestTimeDepositCommand;
use App\Application\Commands\TimeDeposit\SimpleTimeDepositCommand;
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

    public function MakeTimeDeposit(SimpleTimeDepositCommand $command)
    {
        if ($command instanceof SimpleTimeDepositCommand) {
            return $this->DoSimpleTimeDeposit($command);
        } else if ($command instanceof ReinvestTimeDepositCommand) {
            return $this->ReinvestTimeDeposit($command);
        }
    }

    private function DoSimpleTimeDeposit(SimpleTimeDepositCommand $command)
    {
        $days = $command->getDays();
        $amount = $command->getAmount();
        $fullName = $command->getFullName();

        $finalBalance = $this->calculation->PerformCalculation($amount, $days);
        return new TimeDeposit($fullName,$amount,$finalBalance,$days);

    }

    private function ReinvestTimeDeposit(ReinvestTimeDepositCommand $command)
    {
        //TODO -->> $final
    }
}
