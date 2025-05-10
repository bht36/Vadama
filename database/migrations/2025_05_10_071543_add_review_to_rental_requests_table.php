<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReviewToRentalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rental_requests', function (Blueprint $table) {
            $table->enum('review_status', ['done', 'not_done'])->default('not_done');
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
            $table->dropColumn('review_status');
        });
    }
}
