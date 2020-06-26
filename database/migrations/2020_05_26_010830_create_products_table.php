<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->bigInteger('price');
            $table->bigInteger('dis_account')->nullable()->default(0);
            $table->unsignedBigInteger('quantity')->nullable()->default(1);

            $table->unsignedBigInteger('bill_id')->index()->nullable();

            $table->foreign('bill_id')->references('id')->on('bills')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->longText('note')->nullable();

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
        Schema::dropIfExists('products');
    }
}
