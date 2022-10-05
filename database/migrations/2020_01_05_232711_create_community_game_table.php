<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_game', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('game_id')->nullable();//pk1
            $table->unsignedBigInteger('community_id');//pk2
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade'); //fk1
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade');//fk2
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('community_game');
    }
}
