<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('house_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug');
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('description')->nullable();
            $table->unique(['house_id', 'locale']);
            $table->unique('slug');
            $table->timestamps();

            $table->foreign('house_id')->references('id')->on('houses')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('house_translations');
    }
};
