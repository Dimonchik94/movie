<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <button id="addMovie" type="button" class="btn btn-primary">Добавить кинцо</button>


    <div id="add-container" class="popup" style="display: none"></div>
    <div id="edit-container" class="popup" style="display: none"></div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Poster</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <th class="mv-id" style="display: none">{{$movie->id}}</th>
                <th><img class="poster" src="{{$movie->poster}}"></th>
                <th>{{$movie->name}}</th>
                <th>{{$movie->status}}</th>
                <th>
                    <button type="button" class="btn btn-success edit">Edit</button>
                    <button type="button" class="btn btn-danger delete">Delete</button>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>


</section>
<script src="/js/app.js"></script>
<script src="/js/moderate.js"></script>
</body>
</html>
