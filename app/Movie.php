<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    protected $fillable = ['id', 'name', 'poster', 'status'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ganres()
    {
        return $this->belongsToMany(Ganre::class);
    }

    public static function getAllMovies(){
        return Movie::all();
    }

    public static function getAllPublishedMovies(){
        return Movie::all()->where('status', 'published');
    }

    public static function getActionMovies(){
        $ganres = Ganre::find(1);
        return $ganres->movies;
    }

    public static function getComedyMovies(){
        $ganres = Ganre::find(2);
        return $ganres->movies;
    }

    public static function getFantasyMovies(){
        $ganres = Ganre::find(3);
        return $ganres->movies;
    }

    public static function getCurrentMovie($id){
        $movie = Movie::find($id);
        $ganres = $movie->ganres;
        $response = [$movie, $ganres];
        return $response;
    }
}
