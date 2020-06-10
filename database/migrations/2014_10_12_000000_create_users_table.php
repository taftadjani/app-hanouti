<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nick_name', 50)->nullable();
            $table->string('email')->unique();
            $table->string('indicatif')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender',10)->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('enabled')->default(true);
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('lang',10)->default('en');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
