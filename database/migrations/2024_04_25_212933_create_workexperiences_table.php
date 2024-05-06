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
        Schema::create('workexperiences', function (Blueprint $table) {
            $table->id();
            $table->json('company_name');
            $table->string('company_logo');
            $table->date('start_date');
            $table->date('end_date');
            $table->json('position');
            $table->tinyInteger('is_active')->default(1);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workexperiences');
    }
};
