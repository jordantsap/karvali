<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->longText('description')->nullable();

            $table->unique(['room_id', 'locale']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_translations');
    }
};
