<?php


namespace App\Services\TimeDeposit;


class CalculationService
{
    /**
     * @param $amount
     * @param $days
     * @return float|int
     */
    public function PerformCalculation($amount, $days)
    {
        $earningInterests = $this->getPercentageCalculationPerDay($days);
        return $finalBalance = $amount + ($amount * ($earningInterests / 100) * ($days / 360));
    }

    /**
     * @param int $days
     * @return float
     */
    private function getPercentageCalculationPerDay(int $days): float
    {
        switch ($days) {
            case $days >= 30 && $days < 61:
                return 40;
            case $days >= 61 && $days < 121:
                return 45;
            case $days >= 121 && $days < 361:
                return 50;
            default:
                return 60;
        }
    }
}
