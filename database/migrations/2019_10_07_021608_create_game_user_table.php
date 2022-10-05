<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');//pk1
            $table->unsignedBigInteger('game_id');//pk2
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//fk1 
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');//fk2
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_user');
    }
}
