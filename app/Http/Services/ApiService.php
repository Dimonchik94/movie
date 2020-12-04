<?php

namespace App\Http\Services;

use App\Movie;
use Illuminate\Support\Facades\DB;

class ApiService {

    public function findAll(){
        return Movie::with('ganres')->paginate(3);
    }

    public function findOne($id){
        $movie = Movie::find($id);
        $ganres = $movie->ganres;
        $response = [$movie, $ganres];
        return $response;
    }
}
