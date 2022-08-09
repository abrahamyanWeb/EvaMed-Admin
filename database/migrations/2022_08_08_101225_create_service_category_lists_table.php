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
        Schema::create('service_category_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_category_list_am');
            $table->string('service_category_list_ru');
            $table->string('service_category_list_en');
            $table->string('service_category_list_unique');
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
        Schema::dropIfExists('service_category_lists');
    }
};
