<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title')->unique();

            $table->longText('body')->nullable();

            $table->date('start');
            $table->date('end');

            $table->unsignedBigInteger('user_id')->nullable()->index()->comment('how is create event');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('leader_id')->nullable()->index()->comment('leader of the event');
            $table->foreign('leader_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('color')->default('#ffff');

            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('events');
    }
}
