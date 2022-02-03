<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuatationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('quatations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger ('client_id');
            $table->string('quatation_no');
            $table->string('name');
            $table->integer('discount');
            $table->integer('product_id');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade');
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
