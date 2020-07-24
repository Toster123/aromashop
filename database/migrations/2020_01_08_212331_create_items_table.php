<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('price');
            $table->string('description');
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('purchases');
            $table->integer('discount');
            $table->string('img_href')->default('storage/errors/item_no_img.png');
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
        Schema::dropIfExists('items');
    }
}
