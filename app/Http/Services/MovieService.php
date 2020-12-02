<?php

namespace App\Http\Services;

use App\Movie;
use Illuminate\Support\Facades\DB;

class MovieService {

    public function updateMovie($request, $id){
        $name = $request->name;
        $img = $request->img;
        $status = $request->status;

        return DB::table('movies')->where('id', $id)->update([
            'name' => $name,
            'poster' => $img,
            'status' => $status
        ]);
    }

    public function createMovie($request){
        $name = $request->name;
        $img = $request->img;
        $ganresIds = $request->ganresIds;

        $response = [];

        // new movie id
        $id = DB::table('movies')->insertGetId([
            'name' => $name,
            'poster' => $img,
        ]);
        $response["ID фильма"] = $id;
        $response["ID жанров"] = $ganresIds;

        // Добавляет записи в таблицу для связи нового фильма с жанрами
        if ($ganresIds !== null) {
            // не знаю как ещё их можно связать через эту таблицу
            foreach ($ganresIds as $ganre_id) {
                $r = DB::table('ganre_movie')->insert([
                    'ganre_id' => $ganre_id,
                    'movie_id' => $id
                ]);
                // true или false добавления для каждого жанра. просто для проверки
                array_push($response, $r);
            }
        }
        return $response;
    }

    public function deleteMovie($id){
        $response = [];
        $response["del_links"] = DB::table('ganre_movie')->where('movie_id',$id)->delete();
        $response["del_movie"] = DB::table('movies')->where('id',$id)->delete();
        return $response;
    }


}
