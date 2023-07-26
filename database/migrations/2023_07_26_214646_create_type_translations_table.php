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
        Schema::create('type_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug');
//            $table->text('description');

            $table->unique(['type_id', 'locale']);
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_translations');
    }
};
