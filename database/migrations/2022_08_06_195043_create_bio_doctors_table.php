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
        Schema::create('bio_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doctor_unique');
            $table->text('doctor_bio_am');
            $table->text('doctor_bio_ru');
            $table->text('doctor_bio_en');
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
        Schema::dropIfExists('bio_doctors');
    }
};
