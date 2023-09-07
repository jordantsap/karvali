<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('field_id')->unsigned();
            $table->string('locale')->index();

            // The actual fields to store the content of your entity. You can add whatever you need.
            $table->string('title');
            $table->string('slug');

            $table->unique(['field_id', 'locale']);
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
        Schema::dropIfExists('option_translations');
    }
};
