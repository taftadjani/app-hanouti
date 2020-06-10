<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inserted_by');
            $table->foreign('inserted_by')->references('id')->on('users');
            $table->foreignId('product_store_id')->constrained();

            $table->decimal('value',22,2,true)->default(0);
            $table->integer('quantity',false,false)->default(0)->unsigned();

            $table->boolean('enabled')->default(true);

            $table->timestamp('enabled_at')->nullable();
            $table->timestamp('disabled_at')->nullable();

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
        Schema::dropIfExists('prices');
    }
}
