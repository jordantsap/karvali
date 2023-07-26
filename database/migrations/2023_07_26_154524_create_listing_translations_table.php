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
        Schema::create('listing_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('listing_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug');
            $table->text('description');

            $table->unique(['listing_id', 'locale']);
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_translations');
    }
};
