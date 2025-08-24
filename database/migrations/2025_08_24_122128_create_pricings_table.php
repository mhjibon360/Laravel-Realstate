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

        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('package_name')->nullable();
            $table->string('package_icon')->nullable();
            $table->string('package_price')->nullable();
            $table->string('package_validitytime')->nullable();
            $table->string('package_property')->nullable();
            $table->string('package_cardcolor')->default('#5660D9');
            $table->string('account_dashboard')->nullable();
            $table->string('account_dashboard_status')->default(0);
            $table->string('invoice')->nullable();
            $table->string('invoice_status')->default(0);
            $table->string('online_payment')->nullable();
            $table->string('online_payment_status')->default(0);
            $table->string('brand_website')->nullable();
            $table->string('brand_website_status')->default(0);
            $table->string('account_manager')->nullable();
            $table->string('account_manager_status')->default(0);
            $table->string('premium_app')->nullable();
            $table->string('premium_app_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
