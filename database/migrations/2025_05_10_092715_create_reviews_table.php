<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tenant_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');

            $table->tinyInteger('rating'); // values 1 to 5
            $table->text('description');
            $table->text('problem')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
