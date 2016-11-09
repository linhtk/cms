<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id');
            $table->string('short_desc');
            $table->text('description');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->boolean('is_hot');
            $table->boolean('is_sale');
            $table->integer('price');
            $table->integer('sale_price');
            $table->integer('position');
            $table->boolean('active');
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
        Schema::drop('products');
    }
}
