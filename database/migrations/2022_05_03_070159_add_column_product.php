<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('products', ['price_overtime', 'price_overtime', 'deposit_price', 'number_of_seats'])) {
            Schema::table('products', function (Blueprint $table) {
                $table->bigInteger('overtime_price')->nullable();
                $table->bigInteger('over_km_price')->nullable();
                $table->bigInteger('deposit_price')->nullable();
                $table->integer('number_of_seats')->nullable();
            });
        }

        if (!Schema::hasColumns('product_orders', ['price_overtime', 'price_overtime', 'deposit_price', 'number_of_seats'])) {
            Schema::table('product_orders', function (Blueprint $table) {
                $table->bigInteger('overtime_price')->nullable();
                $table->bigInteger('over_km_price')->nullable();
                $table->bigInteger('deposit_price')->nullable();
                $table->integer('number_of_seats')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
