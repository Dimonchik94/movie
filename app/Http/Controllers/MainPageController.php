<?php

namespace App\Http\Controllers;

use App\Movie;

class MainPageController extends Controller
{
    public function index(){
        $movies = Movie::getAllPublishedMovies();
        return view('welcome', compact('movies'));
    }

    // Боевик
    public function action(){
        $movies = Movie::getActionMovies();
        return view('welcome', compact('movies'));
    }

    // Комедия
    public function comedy(){
        $movies = Movie::getComedyMovies();
        return view('welcome', compact('movies'));
    }

    // Фантастика
    public function fantasy(){
        $movies = Movie::getFantasyMovies();
        return view('welcome', compact('movies'));
    }

    // фильм по id
    public function movie($id){
        $response = Movie::getCurrentMovie($id);
        return view('movie', compact('response'));
    }
}
