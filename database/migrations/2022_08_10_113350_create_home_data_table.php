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
        Schema::create('home_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home_data_address_am');
            $table->string('home_data_address_ru');
            $table->string('home_data_address_en');
            $table->string('home_data_email');
            $table->string('home_data_tel');
            $table->string('home_data_face_link');
            $table->string('home_data_insta_link');
            $table->string('home_data_youtube_link');
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
        Schema::dropIfExists('home_data');
    }
};
