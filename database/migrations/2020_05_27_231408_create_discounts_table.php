<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inserted_by');
            $table->foreign('inserted_by')->references('id')->on('users');
            $table->boolean('enabled')->default(false);
            $table->unsignedBigInteger('discountable_id')->nullable();
            $table->string('discountable_type')->nullable(); // product_store, store
            $table->decimal('percentage',3,2,true)->default(0.00);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
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
        Schema::dropIfExists('discounts');
    }
}
