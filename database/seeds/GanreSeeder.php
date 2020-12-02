<?php

use Illuminate\Database\Seeder;

class GanreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Боевик'],
            ['name' => 'Комедия'],
            ['name' => 'Фантастика'],
        ];

        DB::table('ganres')->insert($data);
    }
}
