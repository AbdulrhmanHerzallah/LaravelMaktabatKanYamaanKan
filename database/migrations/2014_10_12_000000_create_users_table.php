<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number');
            $table->string('salary')->nullable();
            $table->date('contract_starting_date')->nullable();
            $table->date('contract_ending_date')->nullable();

            $table->boolean('is_confirmed')->nullable();
            $table->enum('permission' , [1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9]);

            $table->string('national_identity')->nullable();
            $table->string('social_insurance_number')->nullable();
            $table->date('data_subscribe_social')->nullable();

            $table->enum('gender' , ['m', 'f'])->nullable();

            $table->enum('lang' , ['ar' , 'en'])->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
