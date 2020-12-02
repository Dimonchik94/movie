<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanreMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganre_movie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ganre_id');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('ganre_id')->references('id')->on('ganres');
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ganre_movie');
    }
}
