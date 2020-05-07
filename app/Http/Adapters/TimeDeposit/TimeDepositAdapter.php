<?php


namespace App\Http\Adapters\TimeDeposit;


use App\Application\TimeDeposit\TimeDepositCommand;
use App\Exceptions\InvalidBodyException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeDepositAdapter
{
    /**
     * @var string[]
     */
    private array $rules = [
        'fullName' => 'bail|required|alpha|min:6|max:220',
        'amount' => 'bail|numeric|required|min:1',
        'days' => 'bail|integer|required|min:30',
        'confirm' => 'bail|accepted'
    ];
    /**
     * @var string[]
     */
    private array $messages = [
        'fullName.required' => 'Debe ingresar su nombre y apellido.',
        'fullName.min' => 'Su nombre y apellido deben tener minimo 6 letras.',
        'amount.required' => 'Debe ingresar el monto de dinero a depositar.',
        'amount.min' => 'El monto ingresado no puede ser menor a $1',
        'days.required' => 'Debe ingresar la cantidad de días para realizar el cálculo de intereses.',
        'days.min' => 'Debe ingresar un depósito de 30 días como mínimo.',
        'confirm.required' => 'Debe confirmar los permisos antes de continuar.'
    ];

    /**
     * @param Request $request
     * @throws InvalidBodyException
     */
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validate->fails()) {
            throw new InvalidBodyException($validate->errors()->all());
        } else {
            return new TimeDepositCommand(
                $request->input('fullName'),
                $request->input('amount'),
                $request->input('days')
            );
        }
    }
}
