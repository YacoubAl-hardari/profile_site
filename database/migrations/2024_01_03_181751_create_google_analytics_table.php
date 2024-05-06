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
        Schema::create('google_analytics', function (Blueprint $table) {
            $table->id();
            $table->string('google_analytics_id')->nullable();
            $table->string('type')->nullable();
            $table->string('project_id')->nullable();
            $table->string('private_key_id')->nullable();
            $table->text('private_key')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_id')->nullable();
            $table->string('auth_uri')->nullable();
            $table->string('token_uri')->nullable();
            $table->string('auth_provider_x509_cert_url')->nullable();
            $table->string('client_x509_cert_url')->nullable();
            $table->string('universe_domain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_analytics');
    }
};
