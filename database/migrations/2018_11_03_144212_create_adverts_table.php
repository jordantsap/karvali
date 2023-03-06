<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('active')->default(false)->nullable();
            $table->string('link_title')->nullable();
            $table->string('banner')->nullable();
            $table->string('banner_alt')->nullable();
            $table->string('url')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->unsigned()->references('id')->on('users');
            $table->integer("advertable_id")->nullable()->unsigned();
            $table->string("advertable_type")->nullable();
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
        Schema::dropIfExists('adverts');
    }
}
