<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailColumnCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            if (!Schema::hasColumn('customers', 'email')) {
                $table->string('email')->nullable();
            }
        });

        Schema::table('customer_orders', function (Blueprint $table) {
            if (!Schema::hasColumn('customer_orders', 'email')) {
                $table->string('email')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            if (Schema::hasColumn('customers', 'email')) {
                $table->dropColumn('email');
            }
        });

        Schema::table('customer_orders', function (Blueprint $table) {
            if (Schema::hasColumn('customer_orders', 'email')) {
                $table->dropColumn('email');
            }
        });
    }
}
