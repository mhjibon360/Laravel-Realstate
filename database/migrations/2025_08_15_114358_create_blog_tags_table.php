<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag_name')->nullable();
            $table->string('tag_slug')->nullable();
            $table->timestamps();
        });

        Schema::create('blog_posts_blog_tags', function (Blueprint $table) {
            $table->bigInteger('blog_post_id');
            $table->bigInteger('blog_tag_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_tags');
        Schema::dropIfExists('blog_tags_blog_post');
    }
};
