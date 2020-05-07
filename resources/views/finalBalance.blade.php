<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>{{  $NewDeposit->getFullName() }}</p><br/>
<p>{{ $NewDeposit->getAmount() }}</p><br/>
<p>{{ $NewDeposit->getDays() }}</p>
<p>{{  $NewDeposit->getFinalBalance() }}</p><br/>
<input type="checkbox" name="confirm" value="true">
<input type="submit" name="approve" >
</body>
</html>
