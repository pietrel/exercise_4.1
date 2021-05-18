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
            $table->uuid('uuid')->unique();
            $table->float('price');
            $table->enum('rank', [1, 2]);
            $table->string('name');
            $table->enum('type', ['W', 'M', 'A'])->comment('W stands for seat near Window, M stands for Middle seat, A stands for Aisle seat');
            $table->timestamps();
        });
        Schema::table('seats', function (Blueprint $table) {
            $table->foreignId('car_id')->after('uuid')->constrained();
        });
    }

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
