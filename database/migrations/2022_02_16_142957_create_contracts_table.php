<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('pick_date')->nullable();
            $table->string('drop_date')->nullable();
            $table->text('content')->nullable();
            $table->string('paid_date')->nullable();
            $table->string('price_total')->nullable();
            $table->string('price_hour')->nullable();
            $table->string('hour')->nullable();
            $table->string('price_deposits')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('product_order_id')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
