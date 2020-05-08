<?php


namespace App\Services\TimeDeposit;


use App\Application\Commands\TimeDeposit\ReinvestTimeDepositCommand;
use App\Application\Commands\TimeDeposit\SimpleTimeDepositCommand;
use App\Domain\ValueObjects\TimeDeposit;

/**
 * Class TimeDepositService
 * @package App\Services\TimeDeposit
 */
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

    /**
     * @param SimpleTimeDepositCommand $command
     * @return TimeDeposit[]|array
     */
    public function MakeTimeDeposit(SimpleTimeDepositCommand $command): array
    {
        if ($command instanceof SimpleTimeDepositCommand) {
            return [$this->DoSimpleTimeDeposit($command)];
        } else if ($command instanceof ReinvestTimeDepositCommand) {
            return [$this->ReinvestTimeDeposit($command)];
        }
    }

    /**
     * @param SimpleTimeDepositCommand $command
     * @return TimeDeposit
     */
    private function DoSimpleTimeDeposit(SimpleTimeDepositCommand $command)
    {
        $days = $command->getDays();
        $amount = $command->getAmount();
        $fullName = $command->getFullName();

        $finalBalance = $this->calculation->PerformCalculation($amount, $days);
        return new TimeDeposit($fullName,$amount,$finalBalance,$days);

    }

    /**
     * @param ReinvestTimeDepositCommand $command
     * @return TimeDeposit
     */
    private function ReinvestTimeDeposit(ReinvestTimeDepositCommand $command)
    {
        $days = $command->getDays();
        $fullName = $command->getFullName();
        $reinvest = $command->isApprove();
        $initAmount = $command->getAmount();

        if($reinvest){
            $timeDeposits = [$this->calculation->PerformCalculation($command->getAmount(), $days)];

            for($i=1; $i<4; $i++){
                $timeDeposits[]= $this->calculation->PerformCalculation($timeDeposits[$i-1]->getAmount(),$days);
            }
            return new TimeDeposit($fullName, $initAmount, $timeDeposits[], $days);
        }
    }
}
