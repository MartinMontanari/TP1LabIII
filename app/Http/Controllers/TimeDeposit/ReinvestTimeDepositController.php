<?php


namespace App\Http\Controllers\TimeDeposit;


use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\TimeDeposit\ReinvestTimeDepositAdapter;
use App\Http\Controllers\Controller;
use App\Services\TimeDeposit\TimeDepositService;
use Illuminate\Http\Request;

/**
 * Class ReinvestTimeDepositController
 * @package App\Http\Controllers\TimeDeposit
 */
class ReinvestTimeDepositController extends Controller
{
    private ReinvestTimeDepositAdapter $adapter;
    private TimeDepositService $service;

    public function __construct
    (
        ReinvestTimeDepositAdapter $timeDepositAdapter,
        TimeDepositService $timeDepositService
    )
    {
        $this->adapter = $timeDepositAdapter;
        $this->service = $timeDepositService;
    }


    public function execute(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $timeDeposit = $this->service->MakeTimeDeposit($command);
            return redirect()->to(route('finalDeposits'))->with(["NewDeposit" => $timeDeposit]);

        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }

    }
}
