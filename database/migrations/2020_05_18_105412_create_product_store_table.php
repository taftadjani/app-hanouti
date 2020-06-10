<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stores', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inserted_by');
            $table->foreign('inserted_by')->references('id')->on('users');
            $table->foreignId('store_id')->constrained();
            $table->foreignId('product_id')->constrained();

            $table->string('name');
            $table->json('images')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->boolean('have_return')->default(false);
            $table->boolean('visible_on_store')->default(false);
            $table->boolean('negociable')->default(false);
            $table->integer('quantity_stock',false,false)->default(0)->unsigned();

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
        Schema::dropIfExists('product_stores');
    }
}
