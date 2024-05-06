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
        Schema::create('award_and_recognitions', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('image');
            $table->json('award_or_recognition_type');
            $table->string('link_type');
            $table->string('link')->nullable();
            $table->string('description')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('award_and_recognitions');
    }
};
