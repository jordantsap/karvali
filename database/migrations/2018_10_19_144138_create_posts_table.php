<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function (Blueprint $table) {
          $table->increments('id');
          $table->boolean('active')->default(0)->nullable();
          // $table->string('title')->nullable()->unique();
          // $table->string('meta_description');
          // $table->string('meta_keywords');
          // $table->string('slug');
          // $table->longText('description')->nullable();
          $table->string('image')->nullable();
          $table->timestamps();
      });
      Schema::table('posts', function (Blueprint $table) {
        $table->integer('user_id')->unsigned()->after('id');
        $table->foreign('user_id')->unsigned()->references('id')->on('users');
        $table->integer('post_type')->unsigned()->nullable()->after('user_id');
        $table->foreign('post_type')->references('id')->on('post_types');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
