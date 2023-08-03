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
        Schema::create('room_type_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('room_type_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('slug');

            $table->unique(['room_type_id', 'locale']);
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
        Schema::dropIfExists('room_type_translations');
    }
};
