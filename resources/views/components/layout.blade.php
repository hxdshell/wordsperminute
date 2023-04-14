<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Favicon from flaticon.com by freepik : https://www.flaticon.com/free-icons/fire -->
    <link rel="icon" type="image/x-icon" href="{{ url('fire.png') }}">
    <link href="{{ asset('css/main.css?v=').time() }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WPM {{ $title }}</title>
</head>

<body>
    <h1>{{$header}}</h1>
    <div class="maincontainer">
        <div class="mynav">
            @php
                if(Auth::check()){
                    $user = Auth::user();
                    $username = $user->username;
                }
            @endphp
            <p id="account"><a href="/login" class="linkicon"><abbr title="Account">👨‍🚀</abbr></a></p>
            <p><a href="/" class="linkicon"><abbr title="Type">⌨</abbr></a></p>
            <p><a href="/leaderboard" class="linkicon"><abbr title="Leaderboard">👑</abbr></a></p>
            <p><a href="/about" class="linkicon"><abbr title="About">❔</abbr></a></p>
            <p><a href="/logout" class="linkicon" id="logout"><abbr title="Logout">🚪</abbr></a></p>
        </div>
        {{$slot}}
    </div>
</body>
<script>
    let logoutlink = document.getElementById('logout');
    logoutlink.addEventListener("click",function(){
        window.localStorage.clear();
    });
</script>
</html>