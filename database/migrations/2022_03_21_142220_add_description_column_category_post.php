<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionColumnCategoryPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('category_blogs', 'description')) {
                $table->text('description')->nullable();
            }

            if (!Schema::hasColumn('category_blogs', 'depth')) {
                $table->text('depth')->nullable();
            }
            if (!Schema::hasColumn('category_blogs', 'is_active')) {
                $table->tinyInteger('is_active')->default(\App\Models\CategoryBlog::IS_ACTIVE['active']);
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
        Schema::table('category_blogs', function (Blueprint $table) {
            if (Schema::hasColumn('category_blogs', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('category_blogs', 'depth')) {
                $table->dropColumn('depth');
            }

            if (Schema::hasColumn('category_blogs', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }
}
