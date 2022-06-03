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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string("surname")->nullable();
            $table->string("other_names")->nullable();
            $table->string("email")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("dob")->nullable();
            $table->string("gender")->nullable();
            $table->string("address")->nullable();
            $table->string("department")->nullable();
            $table->string("occupation")->nullable();
            $table->string("marital_status")->nullable();
            $table->json("image_path")->nullable();
            $table->json('other_info')->nullable();
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
        Schema::dropIfExists('registrations');
    }
};
