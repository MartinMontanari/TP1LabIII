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
<div class="row justify-content-center">
    <div class="form-group">
        <form class="form-group" method="POST" action="{{ route('reinvest') }}" accept-charset="UTF-8">
            @csrf
            <label class="form-check-label">Nombre y apellido:
                <input type="text" name="fullName" value="{{ $TimeDeposit[0]->getFullName() }}" readonly/>
            </label> <br/>
            <p class="form-check-label">Monto inicial: $ {{ round($TimeDeposit[0]->getAmount(),2) }}</p><br/>
            <label class="form-check-label">Días del último depósito (puede editarlo):
                <input type="text" name="days" value="{{ $TimeDeposit[0]->getDays() }}" />
            </label><br/>
            <label class="form-check-label">Balance final:
                <input class="btn btn-primary btn-block" type="text" name="amount"
                       value="{{ round($TimeDeposit[0]->getFinalBalance(),2) }}" readonly>
            </label><br/>
            <br/>
            <input class="btn btn-primary btn-block" type="submit" value="Reinvertir">
        </form>
    </div>
</div>
</body>
</html>
