<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Keywords : text separé par des virgules
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->string('mail')->nullable();
            $table->string('indicatif')->nullable();
            $table->string('phone')->nullable();

            // BelongTo
            $table->unsignedBigInteger('storeable_id')->nullable();
            $table->string('storeable_type')->nullable(); // User | Company

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');

            // Images
            $table->string('cover')->nullable();


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
        Schema::dropIfExists('stores');
    }
}
