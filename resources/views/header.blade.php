<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>siev20~laravel</title>
</head>
<body>
    <header>
        <nav>
            <a href={{ url("/") }} class={{ request()->path() == "/" ? 'active' : '' }}>Home</a>
            <a href={{ url("/yatzy") }} class={{ request()->path() == "yatzy" ? 'active' : '' }}>Yatzy</a>
            <a href={{ url("/score") }} class={{ request()->path() == "score" ? 'active' : '' }}>Highscore</a>
        </nav>
    </header>
<main>