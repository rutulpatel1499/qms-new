<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuatationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('quatation_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger ('quatation_id');
            $table->unsignedBigInteger ('product_id');
            $table->integer('qty');
            $table->integer('rate');
            $table->integer('total');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->foreign('quatation_id')->references('id')->on('quatations')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
