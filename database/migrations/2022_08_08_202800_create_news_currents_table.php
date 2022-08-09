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
        Schema::create('news_currents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_current_title_am');
            $table->string('news_current_title_ru');
            $table->string('news_current_title_en');
            $table->string('news_current_desc_am');
            $table->string('news_current_desc_ru');
            $table->string('news_current_desc_en');
            $table->string('news_current_unique');
            $table->string('news_current_image');
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
        Schema::dropIfExists('news_currents');
    }
};
