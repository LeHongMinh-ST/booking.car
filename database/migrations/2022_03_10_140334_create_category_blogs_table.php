<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->bigInteger('parent_id')->nullable();;
            $table->string('slug')->nullable();;
            $table->timestamps();
        });

        Schema::create('category_blog_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_blog_id')->nullable();;
            $table->bigInteger('post_id')->nullable();;
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
        Schema::dropIfExists('category_blogs');
        Schema::dropIfExists('category_blog_posts');
    }
}
