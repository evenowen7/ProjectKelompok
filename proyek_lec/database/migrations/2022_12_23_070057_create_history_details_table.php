<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('history_headers_id');
            $table->foreign('history_headers_id')->references('id')->on('history_headers')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->unsignedBigInteger('product_details_id');
            $table->foreign('product_details_id')->references('id')->on('product_details')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->bigInteger('qty');
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
        Schema::dropIfExists('history_details');
    }
}
