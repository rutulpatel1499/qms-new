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
            $table->bigIncrements('id');
            $table->unsignedBigInteger ('category_id');
            $table->unsignedBigInteger ('brand_id');
            $table->string('name');
            $table->integer('rate');
            $table->integer('quantity');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade');
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
