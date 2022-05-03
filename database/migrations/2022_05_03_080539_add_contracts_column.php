<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('contracts', ['price_overtime', 'price_overtime'])) {
            Schema::table('contracts', function (Blueprint $table) {
                $table->bigInteger('overtime_price')->nullable();
                $table->bigInteger('over_km_price')->nullable();
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
