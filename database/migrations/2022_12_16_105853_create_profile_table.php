<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('about');
            $table->string('country');
            $table->integer('phone');
            $table->string('address');
            $table->string('img');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('profile');
    }
};
