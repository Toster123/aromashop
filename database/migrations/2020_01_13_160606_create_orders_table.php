<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type')->default(1);// 1-cart 2-likes 3-order
            $table->integer('user_id')->nullable();
            $table->integer('delivery_method')->nullable();// 1-pickup 2-delivery
            $table->integer('payment_method')->nullable();// 1-upon reciepent 2-paypal
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('adress')->nullable();
            $table->boolean('paid')->default(false)->nullable();
            $table->integer('status_id')->nullable();// 1-pending(в ожидании) 2-accepted 3-during delivery 4-delivered 5-rejected
            $table->timestamp('placed_at')->nullable();
            $table->date('must_delivered_at')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
