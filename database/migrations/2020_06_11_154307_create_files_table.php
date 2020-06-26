<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->string('file_name')->unique();
            $table->string('original_name')->nullable();
            $table->string('file_path');
            $table->string('file_ext')->nullable();
            $table->enum('power' , [1 , 2]);
            $table->string('size');

            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('cat_id')->nullable()->index();
            $table->foreign('cat_id')->references('id')->on('file_categorys')
                ->onUpdate('cascade');





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
        Schema::dropIfExists('file');
    }
}
