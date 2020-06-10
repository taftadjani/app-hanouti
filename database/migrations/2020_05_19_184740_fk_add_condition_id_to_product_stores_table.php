<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkAddConditionIdToProductStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_stores', function (Blueprint $table) {
            $table->foreignId('condition_id')->constrained()->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_stores', function (Blueprint $table) {
            $table->dropForeign(['condition_id']);
            $table->dropColumn(['condition_id']);
        });
    }
}
