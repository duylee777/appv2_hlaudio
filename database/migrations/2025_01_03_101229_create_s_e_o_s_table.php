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
        Schema::create('s_e_o_s', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('type');
            $table->text('type_id')->nullable();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('robots')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('og_locale')->nullable();
            $table->longText('og_site_name')->nullable();
            $table->longText('article_publisher')->nullable();
            $table->longText('og_description')->nullable();
            $table->longText('og_title')->nullable();
            $table->longText('og_type')->nullable();
            $table->longText('og_url')->nullable();
            $table->longText('og_image')->nullable();
            $table->longText('og_image_secure_url')->nullable();
            $table->longText('og_image_height')->nullable();
            $table->longText('og_image_width')->nullable();
            $table->longText('og_image_type')->nullable();
            $table->longText('og_image_alt')->nullable();
            $table->longText('twitter_site')->nullable();
            $table->longText('twitter_card')->nullable();
            $table->longText('twitter_creator')->nullable();
            $table->longText('twitter_title')->nullable();
            $table->longText('twitter_description')->nullable();
            $table->longText('twitter_image')->nullable();
            $table->longText('twitter_label1')->nullable();
            $table->longText('twitter_data1')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_e_o_s');
    }
};
