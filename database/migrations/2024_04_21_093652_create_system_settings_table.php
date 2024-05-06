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
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->json('colors');
            $table->string('header_logo');
            $table->string('footer_logo');
            $table->json('social_links');

            $table->json('service_title_page');
            $table->json('service_title_page_description');

            $table->json('portfolio_title_page');
            $table->json('portfolio_title_page_description');

            $table->json('blog_title_page');
            $table->json('blog_title_page_description');

            $table->json('contact_title_page');
            $table->json('contact_title_page_description');

            $table->string('phone');
            $table->json('slider_text');
            $table->string('email');
            $table->json('location');


            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->string('meta_image')->nullable();
            $table->string('meta_site')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};
