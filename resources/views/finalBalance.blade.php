<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Balance final</title>
</head>
<body>

    <form class="form-group" method="POST" action="{{ route('finalDeposits') }}" accept-charset="UTF-8">
        @csrf
        <label>Nombre y apellido:
        <input type="text" value="{{ $NewDeposit[0]->getFullName() }}"/>
        </label>    <br/>
        <p>Monto inicial: $ {{ $NewDeposit[0]->getAmount() }}</p><br/>
        <label>Días:
        <input type="text" value="{{ $NewDeposit[0]->getDays() }}"/>
        </label><br/>
        <label>Balance final:
        <input type="text" value="{{  $NewDeposit[0]->getFinalBalance() }}">
        </label><br/>
        <br/>
        <input class="btn btn-primary btn-block" type="submit" value="Reinvertir">
    </form>
</body>
</html>
