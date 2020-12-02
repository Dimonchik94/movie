<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Плохие парни', 'poster' => '/images/badboys.jpg', 'status' => 'published'],
            ['name' => 'Гемини', 'poster' => '/images/gemini.jpg', 'status' => 'published'],
            ['name' => 'Бладшот', 'poster' => '/images/Bloodshot.jpg', 'status' => 'published'],
            ['name' => 'Веном', 'poster' => '/images/Venom.jpg', 'status' => 'published'],
            ['name' => 'Плохой Санта', 'poster' => '/images/badsanta.jpg', 'status' => 'published'],
            ['name' => 'Типа крутые легавые', 'poster' => '/images/cops.jpg', 'status' => 'published'],
            ['name' => 'Новогодний корпоратив', 'poster' => '/images/ng.jpg', 'status' => 'published'],
            ['name' => 'Пол: Секретный материальчик', 'poster' => '/images/poul.jpg', 'status' => 'published'],
            ['name' => 'Район № 9', 'poster' => '/images/9.jpg', 'status' => 'published'],
            ['name' => 'Звёздный путь', 'poster' => '/images/Startrek.jpg', 'status' => 'published'],
        ];

        DB::table('movies')->insert($data);
    }
}
