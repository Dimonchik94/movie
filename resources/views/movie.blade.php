<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Movies</title>
</head>
<body>

<header>
    <nav id="head" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/moderate">Редактировать<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<section id="content">

    @php
    $movie = $response[0];
    $ganres = $response[1];
    @endphp

    <div class="current-movie">
        <div id="current-movie-poster">
            <img class="big-poster" src="{{$movie->poster}}" alt="{{$movie->name}}">
        </div>
        <div id="current-movie-description">
            <span class="poster-name">{{$movie->name}}</span>
            <br>
            <p class="movie-description">
                <span class="current-movie-ganres"><b>Жанры: </b>
                    @foreach($ganres as $ganre)
                        {{$ganre->name . " "}}
                    @endforeach
                </span>
                <br>
                <span class="description"><b>Описание:</b> Описание которого нет в базе. Лорем ипсум, все дела...</span>
                <br>
                <span class="comments"><b>Мнение беспонтовых критиков: </b>  ©бла, бла, бла...</span>
            </p>
        </div>
    </div>
</section>
<script src="/js/app.js"></script>
</body>
</html>
