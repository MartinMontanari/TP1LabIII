<?php

namespace App\Http\Controllers\TimeDeposit;

use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\TimeDeposit\TimeDepositAdapter;
use App\Http\Controllers\Controller;
use App\Services\TimeDeposit\TimeDepositService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MakeTimeDepositController extends Controller
{
    private TimeDepositAdapter  $adapter;
    private TimeDepositService $service;

    public function __construct
    (
        TimeDepositAdapter $timeDepositAdapter,
        TimeDepositService $timeDepositService
    )
    {
        $this->adapter = $timeDepositAdapter;
        $this->service = $timeDepositService;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function execute(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $timeDeposit = $this->service->MakeTimeDeposit($command);
            return view('finalBalance', ["deposit"=>$timeDeposit]);
        }catch(InvalidBodyException $errors){
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
