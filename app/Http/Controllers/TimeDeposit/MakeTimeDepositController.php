<?php

namespace App\Http\Controllers\TimeDeposit;

use App\Domain\ValueObjects\TimeDeposit;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\TimeDeposit\TimeDepositAdapter;
use App\Http\Controllers\Controller;
use App\Services\TimeDeposit\TimeDepositService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

/**
 * Class MakeTimeDepositController
 * @package App\Http\Controllers\TimeDeposit
 */
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|RedirectResponse|\Illuminate\View\View
     */
    public function execute(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $timeDeposit = $this->service->MakeTimeDeposit($command);

            //return redirect(view('finalBalance')->with(['TimeDeposit',$timeDeposit]));
            return view('finalBalance',['TimeDeposit'=>$timeDeposit]);
        }catch(InvalidBodyException $errors){
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
