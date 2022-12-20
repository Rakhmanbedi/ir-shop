<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name_kz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name_kz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
        });
    }
};
