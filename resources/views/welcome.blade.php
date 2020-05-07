<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home Banking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="">
<div class="align-content-center">
    <div class="errors-container">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>

    <div class="form-group">
        <form class="form-group" method="POST" action="{{ route('newTimeDeposit') }}" accept-charset="UTF-8"  enctype="multipart/form-data">
            @csrf
            <label class="form-check-label">Nombre y apellido
                <input name="fullName" type="text" placeholder="Nombre y apellido" value="{{ old('fullName') }}" >
            </label>
            <br/>
            <label class="form-check-label">Monto a depositar
                <input name="amount" type="number" placeholder="Monto" value="{{ old('amount') }}"  >
            </label>
            <br/>
            <label class="form-check-label">Días
                <input type="number" name="days" min="30" placeholder="Días de duración depósito" value="{{ old('days') }}"  >
            </label>
            <br/>
            <label class="form-check-label">Confirmación de identidad
                <input name="confirm" type="checkbox" value="true" >
            </label>
            <br/>
            <input class="btn btn-success" type="submit" value="Calcular">
        </form>
    </div>
</div>
</body>
</html>
