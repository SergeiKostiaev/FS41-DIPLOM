<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaHallsTable extends Migration
{
    public function up()
    {
        Schema::create('cinema_halls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('row')->default(0);
            $table->integer('chair')->default(0);
            $table->integer('price_standard')->default(0);
            $table->integer('price_vip')->default(0);
            $table->boolean('free')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_halls');
    }
}
