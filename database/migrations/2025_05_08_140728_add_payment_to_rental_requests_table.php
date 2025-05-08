<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentToRentalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rental_requests', function (Blueprint $table) {
            $table->enum('payment', ['Paid', 'Unpaid'])->default('Unpaid'); // Add payment field after status field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rental_requests', function (Blueprint $table) {
            $table->dropColumn('payment'); // Drop the payment field
        });
    }
}
