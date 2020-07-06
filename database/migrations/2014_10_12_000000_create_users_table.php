<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('verified_at')->nullable();
            $table->string('verify_token')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('vk_id')->nullable()->unique();
            $table->string('photo_href')->default('errors/user_no_photo.png');
            $table->integer('role_id')->default(1);
            $table->string('full_name', 80)->nullable();
            $table->string('adress', 80)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
