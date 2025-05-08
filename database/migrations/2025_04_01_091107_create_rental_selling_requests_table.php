<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalSellingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_selling_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('accounts')->onDelete('cascade'); // Foreign Key to accounts table (buyer)
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade'); // Foreign Key to properties table (property being sold as a rental business)
            $table->enum('status', ['pending', 'approved', 'rejected', 'canceled'])->default('pending'); // Status of the selling request
            $table->decimal('total_price', 10, 2)->nullable();
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('guests')->nullable()->unsigned();
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
        Schema::dropIfExists('rental_selling_requests');
    }
}
