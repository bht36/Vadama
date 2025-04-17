<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(); 
            $table->string('last_name')->nullable();  
            $table->string('username')->nullable();
            $table->enum('user_type', ['seller', 'buyer'])->default('buyer');
            $table->string('phone_number')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('password')->nullable(); 
            $table->string('profile_picture')->nullable(); 
            $table->timestamps(); 
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
        Schema::dropIfExists('accounts');
    }
}
