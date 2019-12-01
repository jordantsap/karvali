<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_type_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_type_id')->unsigned();
            $table->string('locale')->index();

            // The actual fields to store the content of your entity. You can add whatever you need.
            $table->string('name');
            $table->string('slug')->unique();

            $table->unique(['post_type_id', 'locale']);
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
        Schema::dropIfExists('post_type_translations');
    }
}
