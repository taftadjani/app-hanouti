<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inserted_by');
            $table->foreign('inserted_by')->references('id')->on('users');
            $table->foreignId('city_id')->constrained();
            $table->decimal('lng', 10,3);
            $table->decimal('lat', 10,3);
            $table->string('description')->nullable();
            $table->string('zip_code')->nullable(); // Postal code
            $table->unsignedBigInteger('locationable_id');
            $table->string('locationable_type'); // Product_store | Store | User | Company | Provider | Delivery
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
        Schema::dropIfExists('locations');
    }
}
