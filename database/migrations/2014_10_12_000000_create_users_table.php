<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(false)->nullable();
            $table->string('fullname')->nullable();
            $table->string('username');
            $table->string('tel')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('facebookid')->nullable();
            $table->string('twitterid')->nullable();
        });


    }

    /**
     * Reverse the migrations. //
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
