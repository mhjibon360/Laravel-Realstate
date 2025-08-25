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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('gmail')->nullable();
            $table->longText('facebook')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('pinterest')->nullable();
            $table->longText('google')->nullable();
            $table->longText('vimo')->nullable();
            $table->longText('about_details')->nullable();
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
