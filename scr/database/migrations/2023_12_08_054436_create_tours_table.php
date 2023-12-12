<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id('id_tour');
            $table->string('nametour');
            $table->string('image')->nullable();
            $table->string('price');
            $table->string('sale_price')->nullable();
            $table->text('itinerary');
            $table->text('schedule');
            $table->unsignedBigInteger('id_location');
            $table->foreign('id_location')->references('id_location')->on('location');
            $table->integer('numberguests');
            $table->string('vehicle');
            $table->string('domain');
            $table->text('description');
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
        Schema::dropIfExists('tours');
    }
}
