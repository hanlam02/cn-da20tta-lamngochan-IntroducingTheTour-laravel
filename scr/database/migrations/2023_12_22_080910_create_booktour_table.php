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
            $table->string('customer_name')->unique();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('address')->unique();
            $table->string('note')->nullable();
            $table->integer('quantity');
            $table->integer('total')->unique();
            $table->integer('deposit')->unique();//đặt cọc
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
