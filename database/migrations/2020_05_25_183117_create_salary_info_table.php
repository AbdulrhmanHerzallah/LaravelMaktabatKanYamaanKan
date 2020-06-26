<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_info', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('salary_fix');
            $table->date('start_decade');
            $table->date('end_decade');

            $table->string('decade_url')->nullable();

            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('salary_info');
    }
}
