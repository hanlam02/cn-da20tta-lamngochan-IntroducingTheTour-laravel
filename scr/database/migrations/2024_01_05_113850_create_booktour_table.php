<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooktourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booktour', function (Blueprint $table) {
            $table->id('id_booktour');
            $table->unsignedBigInteger('id_tour');
            $table->foreign('id_tour')->references('id_tour')->on('tours');
            $table->unsignedBigInteger('id_contact');
            $table->foreign('id_contact')->references('id_contact')->on('contactinfo');
            $table->unsignedBigInteger('id_vnpay');
            $table->foreign('id_vnpay')->references('id_vnpay')->on('payment');
            $table->integer('quantityAdult');
            $table->integer('quantityChild');
            $table->integer('quantityBaby');
            $table->integer('total')->unique();
            $table->integer('status');
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
        Schema::dropIfExists('booktour');
    }
}
