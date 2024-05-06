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
        Schema::create('email_configuration', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("MAIL_MAILER");
            $table->string("MAIL_HOST");
            $table->string("MAIL_PORT");
            $table->string("MAIL_USERNAME");
            $table->string("MAIL_PASSWORD");
            $table->string("MAIL_ENCRYPTION");
            $table->string("MAIL_FROM_ADDRESS");
            $table->string("MAIL_FROM_NAME");
            $table->string("MAIL_DRIVER");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_configuration');
    }
};
