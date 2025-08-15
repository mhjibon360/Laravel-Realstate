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
            $table->bigInteger('user_id');
            $table->bigInteger('category_id');
            $table->bigInteger('location_id');
            $table->bigInteger('propertytype_id');
            $table->string('property_name');
            $table->string('property_slug');
            $table->string('buy_rent_type');
            $table->string('price');
            $table->string('discount_price');
            $table->longText('property_descriptions');
            $table->string('property_id');
            $table->string('rooms');
            $table->string('garage_size');
            $table->string('property_price');
            $table->string('bedroom');
            $table->string('year_build');
            $table->string('bath_rooms');
            $table->string('property_size');
            $table->string('garaze_count');
            $table->string('amenities');
            $table->string('address');
            $table->string('country');
            $table->string('state_country');
            $table->string('neighborhood');
            $table->string('zip_postal_code');
            $table->string('city');
            $table->longText('longitude');
            $table->longText('latitude');
            $table->longText('page_statistics_image');
            $table->string('hot_property');
            $table->string('featured_property');
            $table->string('status');
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