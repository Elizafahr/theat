<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->integer('row');
            $table->integer('seat_number');
            $table->decimal('price', 10, 2);
            $table->boolean('is_available')->default(true);
            $table->string('section');

            $table->timestamps();
        });


    }
    // public function up()
    // {
    //     Schema::create('seats', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('event_id');
    //         $table->integer('row');
    //         $table->integer('seat_number');
    //         $table->decimal('price', 10, 2);
    //         $table->boolean('is_available')->default(true);
    //         $table->timestamps();

    //         $table->foreign('event_id')
    //               ->references('id')
    //               ->on('events')
    //               ->onDelete('cascade');
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
