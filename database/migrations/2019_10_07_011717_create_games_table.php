<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('court_id');
            $table->Integer('total_players') -> default(0);
            $table->string('match_title', 100)->unique();
            $table->dateTime('date_time');
            $table->dateTime('end_date')->nullable(); 
            $table->Integer('time')->nullable(); 
            $table->double('amount', 8, 2);
            $table->timestamps();
            
            

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            //fk, cascade ni kalau referrred user takdde , match tu hilang
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
