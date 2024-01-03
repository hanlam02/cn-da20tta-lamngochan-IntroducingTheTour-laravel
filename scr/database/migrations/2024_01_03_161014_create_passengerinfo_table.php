<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengerinfo', function (Blueprint $table) {
            $table->id('id_passen');
            $table->unsignedBigInteger('id_contact');
            $table->foreign('id_contact')->references('id_contact')->on('contactinfo');
            $table->integer('gender');
            $table->integer('Type_guest');
            $table->string('note');
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
        Schema::dropIfExists('passengerinfo');
    }
}
