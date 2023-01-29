<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_categories_id');
            $table->foreign('product_categories_id')->references('id')->on('product_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('product_name');
            $table->string('product_detail');
            $table->bigInteger('product_price');
            $table->string('product_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
