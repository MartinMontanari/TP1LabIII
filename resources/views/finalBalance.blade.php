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
    <form class="form-group" method="POST" action="{{ route('reinvestMoney') }}" accept-charset="UTF-8"  enctype="multipart/form-data">
        @csrf
        <p>{{  $NewDeposit->getFullName() }}</p><br/>
        <p>{{ $NewDeposit->getAmount() }}</p><br/>
        <p>{{ $NewDeposit->getDays() }}</p>
        <p>{{  $NewDeposit->getFinalBalance() }}</p><br/>
        <label class="form-check-label">Confirmación de identidad
            <input name="confirm" type="checkbox" value="true">
        </label><br/>
        <input type="submit" name="approve" value="Reinvertir"><br/>

    </form>
    </body>
</html>
