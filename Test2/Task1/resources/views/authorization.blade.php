<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authorization</title>
    <style>

    </style>
</head>
<body>
   
    @if ((Session::get('passError') > 0 )&& ((time() - Session::get('time') < 300)||(Session::get('time')==0))) 
    <h1>
        Неверные данные ( {{ Session::get('passError') }} раз )!!!
    </h1>
    @endif 

    @if (Session::get('passError')>0 && time() - Session::get('time') < 300) 
        <h1> Попробуйте еще раз через {{(300- time() + Session::get('time')) }} секунд(у) </h1>
    @endif 

    @if ((time() - Session::get('time') > 300) || (Session::get('time')==0) ) 
    <div id="form">
    <form name="data" action="{{ route('user') }}" method="POST">
        {{ csrf_field() }}
        <div><label for="nick"> Nickname </label>
        <input id="nick" name="nick" type="text" placeholder="Nickname" required >
        </div>
        <div>
        <label for="pass"> Password  </label>
        <input id="pass" name="pass" type="password" required>
        </div>
        <input type="submit" value="Submit">
    </form>
    </div> 
    @endif

</body>
</html>

