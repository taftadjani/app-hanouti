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

            $table->unsignedBigInteger('inserted_by');
            $table->foreign('inserted_by')->references('id')->on('users');

            $table->string('name');
            $table->string('sku')->nullable();
            $table->string('reference')->unique();
            $table->boolean('is_liquid')->default(false);
            $table->text('description')->nullable();

            // Keywords : text separé par des virgules
            $table->text('keywords')->nullable();

            // images : json format({'1':'path1','2':'path2'}) (l'ordre d'images sera utilisé pour l'affichage) ou separé par des virgules
            $table->text('images')->nullable();

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
        Schema::dropIfExists('products');
    }
}
