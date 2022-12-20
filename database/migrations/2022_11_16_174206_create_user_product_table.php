<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('user_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->tinyInteger('size');
            $table->string('color');
            $table->boolean('status');
            $table->tinyInteger('amount');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_product');
    }
};
