<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id');
            $table->string('listing_type');
            $table->decimal('price', 12, 2)->default(0);
            $table->string('price_period')->nullable();
            $table->unsignedSmallInteger('bedrooms')->default(0);
            $table->unsignedSmallInteger('bathrooms')->default(0);
            $table->decimal('area_sqm', 8, 2)->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('status')->default('available');
            $table->boolean('active')->default(false);
            $table->string('header')->nullable();
            $table->string('logo')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->index(['listing_type', 'status', 'active']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
