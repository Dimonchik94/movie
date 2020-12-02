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
                        <a class="nav-link" href="/moderate">редактировать<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <section id="content">
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Все</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/action">Боевики</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comedy">Комедии</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/fantasy">Фантастика</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="cards-container">
        @foreach($movies as $movie)
                <div class="card">
                    <img class="card-img-top" src="{{$movie->poster}}" alt="{{$movie->name}}">
                    <div class="card-body">
                        <a href="/movie/{{$movie->id}}">{{$movie->name}}</a>
                    </div>
                </div>
        @endforeach
        </div>

    </section>
    <script src="/js/app.js"></script>
</body>
</html>
