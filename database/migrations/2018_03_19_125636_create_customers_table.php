<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('customers', function (Blueprint $table) {
          $table->string('city')->nullable();
          $table->string('province')->nullable();
          $table->string('address')->nullable();
          $table->string('postalcode')->nullable();
          $table->string('phone')->nullable();
          $table->string('facebookid')->nullable();
          $table->string('twitterid')->nullable();
          $table->string('otherinfo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
