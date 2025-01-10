<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoodiesTable extends Migration
{
    public function up()
    {
        Schema::create('hoodies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('description');
            $table->text('meta_description');
            $table->string('main_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoodies');
    }
}
