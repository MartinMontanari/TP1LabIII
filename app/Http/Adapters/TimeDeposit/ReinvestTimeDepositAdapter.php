<?php


namespace App\Http\Adapters\TimeDeposit;


use App\Application\Commands\TimeDeposit\ReinvestTimeDepositCommand;
use App\Exceptions\InvalidBodyException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReinvestTimeDepositAdapter
{
    /**
     * @var string[]
     */
    private array $rules = [
        'fullName' => 'bail|required|alpha|min:6|max:220',
        'amount' => 'bail|required|numeric|min:1000',
        'days' => 'bail|required|integer|min:30',
    ];
    /**
     * @var string[]
     */
    private array $messages = [
        'fullName.required' => 'Debe ingresar su nombre y apellido.',
        'fullName.alpha' => 'Su nombre y apellido debe estar compuesto solo por letras',
        'fullName.min' => 'Su nombre y apellido deben tener mínimo 6 letras.',
        'fullName.max' => 'Su nombre y apellido deben tener máximo 220 letras.',
        'amount.required' => 'Debe ingresar el monto de dinero a depositar.',
        'amount.min' => 'El monto ingresado no puede ser menor a $1000',
        'amount.numeric' => 'Debe ingresar solo números',
        'days.required' => 'Debe ingresar la cantidad de días para realizar el cálculo de intereses.',
        'days.min' => 'Debe ingresar un depósito de 30 días como mínimo.',
        'days.integer' => 'Los días ingresados deben ser números enteros',
    ];

    /**
     * @param Request $request
     * @return ReinvestTimeDepositCommand
     */
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validate->fails()) {
            throw new InvalidBodyException($validate->errors()->getMessages());
        }

        return new ReinvestTimeDepositCommand(
            $request->input('fullName'),
            $request->input('amount'),
            $request->input('days'),
        );

    }
}
