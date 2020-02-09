<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('room_type_id');
            $table->timestamps();

            $table->foreign('hotel_id')
            ->on('hotels')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('room_type_id')
            ->on('room_types')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
