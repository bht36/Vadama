<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToRentalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rental_requests', function (Blueprint $table) {
            $table->decimal('total_price', 10, 2)->nullable();
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
            $table->integer('duration')->nullable();
            $table->unsignedInteger('guests')->nullable();
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
            $table->dropColumn(['total_price', 'check_in', 'check_out', 'duration', 'guests']);
        });
    }
}
