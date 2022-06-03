<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attandance', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time_clocked_in')->nullable();
            $table->unsignedBigInteger('register_id')->nullable();
            $table->foreign('register_id')->references('id')->on('registrations')->onDelete('cascade');
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
        Schema::dropIfExists('attandance');
    }
};
