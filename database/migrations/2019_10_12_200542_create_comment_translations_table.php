<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            //table that is translated
            $table->string('comment')->nullable()->unique();
            $table->integer('comment_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['comment_id', 'locale']);
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
        Schema::dropIfExists('comment_translations');
    }
}
