<?php

use Illuminate\Database\Seeder;

class GanreMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['ganre_id' => '1', 'movie_id' => '1'],
            ['ganre_id' => '1', 'movie_id' => '2'],
            ['ganre_id' => '1', 'movie_id' => '3'],
            ['ganre_id' => '1', 'movie_id' => '6'],
            ['ganre_id' => '2', 'movie_id' => '1'],
            ['ganre_id' => '2', 'movie_id' => '5'],
            ['ganre_id' => '2', 'movie_id' => '6'],
            ['ganre_id' => '2', 'movie_id' => '7'],
            ['ganre_id' => '2', 'movie_id' => '8'],
            ['ganre_id' => '3', 'movie_id' => '4'],
            ['ganre_id' => '3', 'movie_id' => '8'],
            ['ganre_id' => '3', 'movie_id' => '9'],
            ['ganre_id' => '3', 'movie_id' => '10'],
        ];

        DB::table('ganre_movie')->insert($data);
    }
}
