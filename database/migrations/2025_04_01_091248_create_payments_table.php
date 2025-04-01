<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payer_id');
            $table->unsignedBigInteger('property_id');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['eSewa', 'Khalti', 'PhonePay']);
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->string('transaction_id')->nullable();
            $table->timestamps();

            $table->foreign('payer_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
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
        Schema::dropIfExists('payments');
    }
}
