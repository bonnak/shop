<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
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
            $table->integer('seller_id')->unsigned()->index();
            $table->string('product_name');
            $table->decimal('price')->nullable();
            $table->string('unit_price')->nullable();
            $table->decimal('discount')->default(0);
            $table->decimal('discount_in_percentage')->default(0);
            $table->integer('total_items')->nullable();
            $table->integer('broken_items')->default(0);
            $table->text('review')->nullable();
            $table->integer('category_id');
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
