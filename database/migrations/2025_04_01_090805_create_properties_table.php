<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade'); // Foreign Key to accounts table
            $table->string('title')->nullable(); // Required
            $table->text('description')->nullable(); // Optional
            $table->text('type')->nullable(); // Optional
            $table->string('location')->nullable(); // Optional
            $table->decimal('price_per_month', 10, 2)->nullable(); // Optional
            $table->enum('status', ['available', 'pending', 'rented'])->default('available'); 
            $table->time('checkin_time')->nullable();
            $table->time('checkout_time')->nullable();
            $table->text('key_points')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
