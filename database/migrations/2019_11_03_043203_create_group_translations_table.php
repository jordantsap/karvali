<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('group_id')->unsigned();
            $table->string('locale')->index();

            // The actual fields to store the content of your entity. You can add whatever you need.
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('manager');
            $table->longText('description');

            $table->unique(['group_id', 'locale']);
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
        Schema::dropIfExists('group_translations');
    }
}
