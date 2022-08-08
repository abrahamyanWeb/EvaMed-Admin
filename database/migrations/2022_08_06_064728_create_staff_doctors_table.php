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
        Schema::create('staff_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doctor_name_am');
            $table->string('doctor_name_ru');
            $table->string('doctor_name_en');
            $table->string('doctor_type_am');
            $table->string('doctor_type_ru');
            $table->string('doctor_type_en');
            $table->string('doctor_unique');
            $table->string('doctor_image');
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
        Schema::dropIfExists('staff_doctors');
    }
};
