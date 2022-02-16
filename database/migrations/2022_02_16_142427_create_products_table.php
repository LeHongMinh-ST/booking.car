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
            $table->string('name')->nullable();
            $table->string('color')->nullable();
            $table->string('year')->nullable();
            $table->string('license_plates')->nullable();
            $table->string('price')->nullable();
            $table->string('km')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->text('other_parameters')->nullable();
            $table->tinyInteger('status')->default(\App\Models\Product::STATUS['normal'])->nullable();
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
        Schema::dropIfExists('products');
    }
}
