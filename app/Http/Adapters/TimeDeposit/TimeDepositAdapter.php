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
        'fullName' => 'required|alpha|min:6|max:220',
        'amount' => 'numeric|required|min:1',
        'days' => 'integer|required|min:30',
        'confirm' => 'accepted|required'
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
        'amount.min' => 'El monto ingresado no puede ser menor a $1',
        'amount.numeric' => 'Debe ingresar solo números',
        'days.required' => 'Debe ingresar la cantidad de días para realizar el cálculo de intereses.',
        'days.min' => 'Debe ingresar un depósito de 30 días como mínimo.',
        'days.integer' => 'Los días ingresados deben ser números enteros',
        'confirm.accepted' => 'Debe confirmar los permisos antes de continuar.',
        'confirm.required' => 'Debe confirmar los permisos antes de continuar.'
    ];

    /**
     * @param Request $request
     * @return TimeDepositCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validate->fails()) {
            throw new InvalidBodyException($validate->errors()->getMessageBag());
        } else {
            return new TimeDepositCommand(
                $request->input('fullName'),
                $request->input('amount'),
                $request->input('days')
            );
        }
    }
}
