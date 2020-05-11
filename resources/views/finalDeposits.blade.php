<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Final deposits</title>
</head>
<body>

@foreach($TimeDeposit as $timeDeposit)
    <p>Nombre y apellido: {{ $timeDeposit->getFullName() }} / Días de duración: {{ $timeDeposit->getDays() }}</p><br/>
    <p>Monto inicial: $ {{ round($timeDeposit->getAmount(),2) }}</p><br/>
    <p>Monto final: $ {{ round($timeDeposit->getFinalBalance(),2) }}</p><br/>
    <hr/>
@endforeach
    <div class="container">
        <div class="align-content-center">
            <div class="errors-container">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
