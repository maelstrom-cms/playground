<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->longText('body');
            $table->bigInteger('author_id');
            $table->bigInteger('gallery_id')->nullable();
            $table->bigInteger('category_id');
            $table->unsignedInteger('rating')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->string('featured_headline')->nullable();
            $table->bigInteger('featured_image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('post_post', function (Blueprint $table) {
            $table->bigInteger('post_one_id');
            $table->bigInteger('post_two_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_post');
    }
}
