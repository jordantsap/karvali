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
        Schema::create('booking_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id')->unsigned();
            $table->string('title');
            $table->string('slug');

            $table->string('locale')->index();

            $table->unique(['booking_id', 'locale']);
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
        Schema::dropIfExists('booking_translations');
    }
};
