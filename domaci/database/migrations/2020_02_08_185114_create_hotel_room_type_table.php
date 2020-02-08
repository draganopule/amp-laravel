<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_room_type', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('room_type_id');

            $table->primary(['hotel_id', 'room_type_id']);

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
        Schema::dropIfExists('hotel_room_type');
    }
}
