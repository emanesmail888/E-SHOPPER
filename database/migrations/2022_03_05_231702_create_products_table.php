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
            $table->string('pro_name');
            $table->string('pro_code');
            $table->integer('pro_price');
            $table->string('image')->nullable();
            $table->string('pro_info');
            $table->string('stock');
            $table->integer('category_id');
            $table->integer('subCategories_id');
            $table->string('spl_price')->nullable();
            $table->tinyInteger('new_arrival')->default('0')->nullable();
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
