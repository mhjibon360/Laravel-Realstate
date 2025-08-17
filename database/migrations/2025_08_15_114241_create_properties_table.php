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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('category_id')->nullable();;
            $table->bigInteger('location_id')->nullable();;
            $table->bigInteger('propertytype_id')->nullable();;
            $table->string('property_name')->nullable();;
            $table->string('property_slug')->nullable();;
            $table->string('buy_rent_type')->nullable();;
            $table->string('price')->nullable();;
            $table->string('discount_price')->nullable();;
            $table->longText('property_descriptions')->nullable();;
            $table->string('property_id')->nullable();;
            $table->string('rooms')->nullable();;
            $table->string('garage_size')->nullable();;
            $table->string('property_price')->nullable();;
            $table->string('bedroom')->nullable();;
            $table->string('year_build')->nullable();;
            $table->string('bath_rooms')->nullable();;
            $table->string('property_size')->nullable();;
            $table->string('garaze_count')->nullable();;
            $table->string('amenities')->nullable();;
            $table->string('address')->nullable();;
            $table->string('country')->nullable();;
            $table->string('state_country')->nullable();;
            $table->string('neighborhood')->nullable();;
            $table->string('zip_postal_code')->nullable();;
            $table->string('city')->nullable();;
            $table->string('thumbnail')->nullable();;
            $table->longText('longitude')->nullable();;
            $table->longText('latitude')->nullable();;
            $table->longText('page_statistics_image')->nullable();;
            $table->string('hot_property')->nullable();;
            $table->string('featured_property')->nullable();;
            $table->string('status')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
