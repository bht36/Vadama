<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('accounts')->onDelete('cascade'); // Foreign Key to accounts table (tenant)
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade'); // Foreign Key to properties table (requested property)
            $table->enum('status', ['pending', 'approved', 'rejected', 'canceled'])->default('pending'); // Status of the request
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
        Schema::dropIfExists('rental_requests');
    }
}
